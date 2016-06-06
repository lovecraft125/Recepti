<?php
namespace libs;

class Session{
    public static function getKey($key, $default = null){
        if(!isset($_SESSION)){
            session_start();
        }
        
        if(!isset($_SESSION[$key])){
            return $default;
        }else{
            return $_SESSION[$key];
        }
    }
    
    public static function setKey($key, $value){
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION[$key] = $value;
    }
};
