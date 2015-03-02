<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 19:22
 */

namespace robot;


class HttpUserIdentity extends AUserIdentity {
    protected $cookieFile = null;

    /**
     * @param mixed $cookieFile
     */
    public function setCookieFile($cookieFile)
    {
        $this->cookieFile = $cookieFile;
    }

    /**
     * @return mixed
     */
    public function getCookieFile()
    {
        if ($this->cookieFile) {
            return $this->cookieFile;
        }

        return "./{$this->login}.cookie";
    }


} 