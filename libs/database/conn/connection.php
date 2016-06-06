<?php
namespace libs\database\conn;

class connection{
    
    
    private static $instance;
    
    private function __construct() {
        
    }
    
    public static function getInstanc(){
        if(self::$instance === null)
            return self::$instance = new \PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
        return self::$instance;
    }
    
}
