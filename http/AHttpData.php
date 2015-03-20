<?php
/**
 * User: shnell
 * Date: 19.03.15
 * Time: 23:20
 */

namespace web_client\http;


abstract class AHttpData {
    public $page;

    /**
     * @return array
     */
    abstract public function toArray();

    public function toParams() {
        return http_build_query($this->toArray());
    }
} 