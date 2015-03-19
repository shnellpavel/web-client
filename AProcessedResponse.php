<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 22:27
 */

namespace web_client;

abstract class AProcessedResponse extends AResponse {
    protected $originalResponse;

    public function __construct(AResponse $response) {
        $this->originalResponse = $response;
        $this->process();
    }

    abstract protected function process();
}