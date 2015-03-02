<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 15:35
 */
namespace robot;

abstract class ARequestProvider {
    protected $opts;

    public function __construct($opts = array()) {
        $this->opts = $opts;
    }

    public abstract function sendRequest(ARequest $request);
} 