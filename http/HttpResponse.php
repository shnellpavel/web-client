<?php
/**
 * User: shnell
 * Date: 01.03.15
 * Time: 17:22
 */

namespace web_client\http;

use web_client\AResponse;

class HttpResponse extends AResponse {

    /* @var array */
    protected $headers;

    /**
     * @param string $body
     * @param array  $headers
     */
    public function __construct($body = '', $headers = array()) {
        parent::__construct($body);
        $this->headers = $headers;
    }

    /**
     * @param null|array $filter
     * @return array
     */
    public function getHeaders($filter = null) {
        if ($filter) {
            if (is_array($filter)) {
                $headers = array();
                foreach ($filter as $headerName) {
                    $headers[$headerName] = $this->getHeader($headerName);
                }
                return $headers;
            } elseif (is_string($filter)){
                return $this->getHeader($filter);
            }
        }
        return $this->headers;
    }

    /**
     * @param string $headerName
     * @return null|string
     */
    public function getHeader($headerName) {
        if (isset($this->headers[$headerName])) {
            return $this->headers[$headerName];
        }

        return null;
    }

}