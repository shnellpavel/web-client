<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 17:25
 */

namespace robot;


class HhUser extends AUser {
    const DOMAIN = 'http://hh.ru';

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

        if (!preg_match("/<form.*?\/account\/login\".*?>(.*?)<\/form>/simu", $response->getBody(), $formMarkup)) {
            throw new AuthenticationException("Login page has changed markup.");
        }

        $formMarkup = $formMarkup[1];

        if (!preg_match_all("/name=['\"](.*?)['\"]/simu", $formMarkup, $inputNames)) {
            throw new AuthenticationException("Login page has changed markup.");
        }

        $inputNames = $inputNames[1];

        $loginData = array();
        foreach ($inputNames as $inputName) {
            if (preg_match("/<[^>]*?
                            (?:name=['\"]{$inputName}['\"][^>]*?value=['\"]([^>]*?)['\"]
                            |value=['\"]([^>]*?)['\"][^>]*?name=['\"]{$inputName}['\"])
                            [^>]*?>/simux", $formMarkup, $value))
            {
                if (isset($value[1]) && $value[1]) {
                   $loginData[$inputName] = $value[1];
                } elseif (isset($value[2]) && $value[2]) {
                   $loginData[$inputName] = $value[2];
                }
            }
        }

        $loginData['username'] = $this->userIdentity->getLogin();
        $loginData['password'] = $this->userIdentity->getPassword();

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

    public function getResumes() {
        $this->login();
        $requestProvider = new HttpRequestProvider();
        $request = new HttpRequest(self::DOMAIN);
        $request->setOpts(array('cookie' => $this->userIdentity->getCookieFile()));

        $response = $requestProvider->sendRequest($request);
        return $response->getBody();
    }
}

class AuthenticationException extends \Exception {}