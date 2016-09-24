<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 17:25
 */

namespace web_client\http\hh;


use web_client\AUser;
use web_client\exceptions\AuthenticationException;
use web_client\http\HttpData;
use web_client\http\HttpRequest;
use web_client\http\HttpRequestProvider;

class HhUser extends AUser {
    const DOMAIN = 'https://hh.ru';

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

        $response = $requestProvider->sendRequest($request);
        if ($response->getHeader("http_code") != 200 ) {
            throw new AuthenticationException("Login page is not available!");
        }
    }

    protected function isAuthenticated() {
        $requestProvider = new HttpRequestProvider();

        $request = new HttpRequest(self::DOMAIN);
        $request->setOpts(array('cookie' => $this->userIdentity->getCookieFile()));

        $response = $requestProvider->sendRequest($request);

        return preg_match("/<div[^>]*?data-qa=\"mainmenu_normalUserName\"[^>]*?>/sim", $response->getBody());
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