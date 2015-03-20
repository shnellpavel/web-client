<?php
/**
 * User: shnell
 * Date: 21.03.15
 * Time: 1:34
 */

namespace web_client\http;


use web_client\AProcessedResponse;

class HttpProcessedResponse extends AProcessedResponse {

    public function getHeader($name) {
        $this->originalResponse->getHeader($name);
    }

    public function getHeaders($filter = null) {
        $this->originalResponse->getHeaders($filter);
    }

    protected function process() {
        $this->body = $this->originalResponse->getBody();
    }
}