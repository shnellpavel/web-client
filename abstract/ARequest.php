<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 15:38
 */
namespace robot;

abstract class ARequest {
    /* @var string */
    protected $url;
    /* @var array */
    protected $data;
    /* @var array */
    protected $opts;

    public function __construct($url = '', $data = array(), $opts = array()) {
        $this->url = $url;
        $this->data = $data;
        $this->opts = $opts;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $opts
     */
    public function setOpts($opts)
    {
        $this->opts = $opts;
    }

    /**
     * @return array
     */
    public function getOpts()
    {
        return $this->opts;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


} 