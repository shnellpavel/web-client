<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 16:01
 */
namespace robot;

abstract class AUser {
    /* @var AUserIdentity */
    protected $userIdentity;

    public function __construct(AUserIdentity $userIdentity) {
        $this->userIdentity = $userIdentity;
    }

    abstract protected function login();
} 