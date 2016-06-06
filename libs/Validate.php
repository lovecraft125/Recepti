<?php
namespace libs;

class Validate{
    
    public static function validate_string($string){
        $valid_string = '';
        if(strlen($string) > 2){
            $validate_string = trim(htmlentities($string));
            return $validate_string;
        }
        return false;
    }
    public static function validate_email($email){
        $valid_email = '';
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
        if(preg_match($pattern, $email)){
            $valid_email = trim(htmlentities($email));
            return $valid_email;
        }
        
        return false;
    }
    public static function validate_password($password){
        $valid_password = '';
        if(strlen($password) > 3){
            $valid_password = trim(htmlentities(hash('sha256',$password)));
            return $valid_password;
        }
        return false;
    }
    
}
