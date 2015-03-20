<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 17:19
 */
namespace web_client\http;

use web_client\ARequest;

class HttpRequest extends ARequest {
    const HTTP_GET = "GET";
    const HTTP_POST = "POST";

    /* @var string */
    protected $method;

    public function __construct($url = '', AHttpData $data = null, $type = self::HTTP_GET, $opts = array()) {
        parent::__construct($url, $data, $opts);
        $this->method = $type;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }


}