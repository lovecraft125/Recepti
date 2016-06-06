<?php
namespace libs;

class Comment extends database\DB{
    protected static $table = "comments";
    protected static $keyColumn  = "id";
    
    public $author;
    public $recepie_id;
    public $comment;
    
    public  function set_values(array $posts){
        foreach($posts as $key=>$value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }
}
