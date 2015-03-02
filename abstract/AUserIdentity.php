<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 16:02
 */
namespace robot;

abstract class AUserIdentity {
    /* @var string */
    protected $login;
    /* @var string */
    protected $password;

    public function __construct($login, $password = '') {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


} 