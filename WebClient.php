<?php
/**
 * User: shnell
 * Date: 21.03.15
 * Time: 20:28
 */

class WebClient extends CComponent {
    public static function init() {
        YiiBase::registerAutoloader(array('WebClient', 'autoload'), true);
    }

    public static function autoload($class_name) {
        $class_name = str_replace('\\', "/", $class_name);
        $class_name = str_replace('web_client/', "", $class_name);
        if (file_exists(dirname(__FILE__)."/$class_name.php")) {
            include dirname(__FILE__)."/$class_name.php";
        }
    }
}