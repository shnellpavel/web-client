<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 19:53
 */

namespace robot;


class HttpRequestProvider extends ARequestProvider {

    /**
     * @param ARequest $request
     * @return HttpResponse
     */
    public function sendRequest(ARequest $request) {
        $stdOpts = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36",
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_VERBOSE => 0,
//            CURLOPT_PROXY => '127.0.0.1:8888',
        );
        $ch = curl_init();


        $curOpts = $request->getOpts() + $stdOpts;

        foreach ($curOpts as $opt => $value) {
            switch ($opt) {
                case 'cookie':
                    curl_setopt($ch, CURLOPT_COOKIEFILE, $value);
                    curl_setopt($ch, CURLOPT_COOKIEJAR, $value);
                    break;
                default:
                    curl_setopt($ch, $opt, $value);
                    break;
            }
        }

        switch ($request->getMethod()) {
            case HttpRequest::HTTP_GET:
                curl_setopt($ch, CURLOPT_URL, $request->getUrl()."?".http_build_query($request->getData()));
                curl_setopt($ch, CURLOPT_POST, 0);
                break;
            case HttpRequest::HTTP_POST:
                curl_setopt($ch, CURLOPT_URL, $request->getUrl());
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getData());
                break;
        }

        $body = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);

        return new HttpResponse($body, $headers);
    }
}