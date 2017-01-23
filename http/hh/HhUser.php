<?php

namespace web_client\http\hh;

use web_client\AUser;
use web_client\exceptions\AuthenticationException;
use web_client\http\HttpData;
use web_client\http\HttpRequest;
use web_client\http\HttpRequestProvider;

class HhUser extends AUser {
    const DOMAIN = 'https://novosibirsk.hh.ru';

    public function __construct(HhUserIdentity $userIdentity) {
        parent::__construct($userIdentity);
    }

    protected function login() {
        if ($this->isAuthenticated()) {
            return;
        }

        $requestProvider = new HttpRequestProvider();

        $request = new HttpRequest(self::DOMAIN."/account/login");
        $request->setOpts(array('cookie' => $this->userIdentity->getCookieFile()));

        $response = $requestProvider->sendRequest($request);

        if ($response->getHeader("http_code") == 200)
        {
            // In this case we've got the page tag <meta http-equiv="refresh" ...>. It will not processed by curl.
            if (preg_match("%<a href=[\"'](.*?)[\"']>Если страница не открывается автоматически в течении нескольких секунд, нажмите на эту надпись</a>%simu", $response->getBody(), $revalidateData)) {
                $request = new HttpRequest($revalidateData[1]);
                $request->setOpts(array('cookie' => $this->userIdentity->getCookieFile()));
                $response = $requestProvider->sendRequest($request);
            }
        }

        if ($response->getHeader("http_code") == 299)
        {
            // In this case we've got the page with JS-script that should set a cookie and redirect
            if (!preg_match("/document\.cookie=[\"']([a-z]+=.*?)[\"'].*?location\.href=[\"'](.*?)[\"']/simu", $response->getBody(), $checkBrowserData)) {
                throw new AuthenticationException("Fail to find testBrowser cookie during login.");
            }

            $request = new HttpRequest($checkBrowserData[2]);
            $request->setOpts(
                array(
                    'cookie'           => $this->userIdentity->getCookieFile(),
                    CURLOPT_HTTPHEADER => array("Cookie: ".$checkBrowserData[1]),
                )
            );

            $response = $requestProvider->sendRequest($request);
        }

        if ($response->getHeader("http_code") != 200 ) {
            throw new AuthenticationException("Login page is not available!");
        }

        if (!preg_match("/<form.*?\/account\/login[^>]*?\".*?>(.*?)<\/form>/simu", $response->getBody(), $formMarkup)) {
            throw new AuthenticationException("Login page has changed markup.");
        }

        $formMarkup = $formMarkup[1];

        if (!preg_match_all("/name=['\"](.*?)['\"]/simu", $formMarkup, $inputNames)) {
            throw new AuthenticationException("Login page has changed markup.");
        }

        $inputNames = $inputNames[1];

        $loginData = new HttpData();
        foreach ($inputNames as $inputName) {
            if (preg_match("/<[^>]*?
                            (?:name=['\"]{$inputName}['\"][^>]*?value=['\"]([^>]*?)['\"]
                            |value=['\"]([^>]*?)['\"][^>]*?name=['\"]{$inputName}['\"])
                            [^>]*?>/simux", $formMarkup, $value))
            {
                if (isset($value[1]) && $value[1]) {
                   $loginData->$inputName = $value[1];
                } elseif (isset($value[2]) && $value[2]) {
                   $loginData->$inputName = $value[2];
                }
            }
        }

        $loginData->username = $this->userIdentity->getLogin();
        $loginData->password = $this->userIdentity->getPassword();

        $request->setMethod(HttpRequest::HTTP_POST);
        $request->setData($loginData);
        $request->setOpts(
            array(
                CURLOPT_MAXREDIRS  => 30,
                'cookie'           => $this->userIdentity->getCookieFile(),
            )
        );

        $response = $requestProvider->sendRequest($request);
        if ($response->getHeader("http_code") != 200 ) {
            throw new AuthenticationException("Could not authenticate!");
        }

        if (!$this->isAuthenticated()) {
            throw new AuthenticationException("Could not authenticate!");
        }
    }

    protected function isAuthenticated() {
        $requestProvider = new HttpRequestProvider();

        $request = new HttpRequest(self::DOMAIN);
        $request->setOpts(array('cookie' => $this->userIdentity->getCookieFile()));

        $response = $requestProvider->sendRequest($request);

        return preg_match("/<div[^>]*?data-qa=\"mainmenu_userName\"[^>]*?>/sim", $response->getBody());
    }

    public function getResumes(ResumeListData $data, $limit = 100, $startPage = 0) {
        $this->login();
        $listProvider = new HhResumeListProvider(49, 0, $startPage);
        $resumeProvider = new HttpRequestProvider();
        $resumes = array();

        $request = new HttpRequest(self::DOMAIN."/search/resume", $data);
        $request->setOpts(array('cookie' => $this->userIdentity->getCookieFile()));

        try {
            while ($response = $listProvider->next($request)) {
                try {
                    foreach ($response->getBody() as $url => $position) {
                        $resumeRequest = new HttpRequest(self::DOMAIN.$url);
                        $resumeRequest->setOpts(
                            array(
                                'cookie' => $this->userIdentity->getCookieFile(),
                                CURLOPT_REFERER => $response->getHeader('url')
                            )
                        );

                        try {
                            $resumeResponse = new ResumeResponse($resumeProvider->sendRequest($resumeRequest));
                            $resume = $resumeResponse->getBody();
                            $resume['searchPosition'] = $position;
                            $resumes[] = $resume;
                        } catch (\Exception $e) {}

                        if ($limit != null && $limit > 0 && count($resumes) >= $limit) {
                            return $resumes;
                        }
                        usleep(500000);
                    }
                } catch (\Exception $e) {
                    if ($limit != null && $limit > 0 && count($resumes) >= $limit) {
                        return $resumes;
                    }
                    usleep(500000);
                }
                $opts = $request->getOpts();
                $opts[CURLOPT_REFERER] = $response->getHeader('url');
                $request->setOpts($opts);
            }
        } catch (\Exception $e) {}

        return $resumes;
    }
}