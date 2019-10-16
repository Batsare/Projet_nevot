<?php
/**
 * Created by PhpStorm.
 * User: abats
 * Date: 10/03/17
 * Time: 12:02
 */

namespace Core;


class Config
{
    private $settings = [];
    private static $_instance;

    public static function getInstance($file){
        if(is_null(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file)
    {
        $this -> settings = require($file);
    }

    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }

    public function set($key, $value){
        $this->settings[$key] = $value;
    }
}