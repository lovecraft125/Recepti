<?php
namespace libs;
class Author extends database\DB{
    protected static $table = "authors";
    protected static $keyColumn = "id";
    //Nazivi kolona
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    
    private $errors = array();
    public function set_values(array $posts){
        foreach ($posts as $key=>$value){
            if(property_exists($this, $key))
               $this->$key = $value;
        }        
    }
    public function errors(){
        return $this->errors;
    }
}
