<?php
namespace libs;

class Category extends database\DB{
    protected static $table = "categories";
    protected static $keyColumn = "id";
    
    public $category;
    
    private $message;
    private $errors = array();
    
    public function set_values(array $posts){
        foreach ($posts as $key=>$value){
            if(property_exists($this, $key))
               $this->$key = $value;
        }
       
    }
}
