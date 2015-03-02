<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 16:04
 */
namespace robot;

abstract class AResponse {
    /* @var mixed */
    protected $body;

    /**
     * @param string $body
     */
    public function __construct($body = '') {
        $this->body = $body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }


} 