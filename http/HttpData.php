<?php
/**
 * User: shnell
 * Date: 24.03.15
 * Time: 22:17
 */

namespace web_client\http;


class HttpData extends AHttpData {
    protected $_data = array();

    /**
     * @return array
     */
    public function toArray() {
        return $this->_data;
    }

    public function __get($name) {
        if (isset($this->_data[$name])) {
            return $this->_data[$name];
        }
        return null;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            $this->_data[$name] = $value;
        }
    }
}