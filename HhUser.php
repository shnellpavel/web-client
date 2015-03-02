<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 17:25
 */

namespace robot;


class HhUser extends AUser {
    const DOMAIN = 'hh.ru';

    public function __construct(HhUserIdentity $userIdentity) {
        parent::__construct($userIdentity);
    }

    protected function login() {
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
                $loginData[$inputName] = ($value[1]) ? $value[1] : $value[2];
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
}

class AuthenticationException extends \Exception {}