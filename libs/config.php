<?php

session_start();
//Putanja
define("PATH", $_SERVER['DOCUMENT_ROOT']."/Recepti/");
//Parametri za povezivanje sa bazom
define("DB_HOST","localhost");
define("DB_USER","kulinar");
define("DB_PASS","codename47");
define("DB_NAME","recepti");

spl_autoload_register(function($class){
    
    $old = explode('\\', $class);
    $class_new = implode('/', $old); 
    include PATH.$class_new.'.php';
});
