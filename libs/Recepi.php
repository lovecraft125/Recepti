<?php
namespace libs;
class Recepi extends database\DB{
    protected static $table = "recepies";
    protected static $keyColumn = "id";
    //Nazivi kolona
    public $author_id;
    public $category_id;
    public $title;
    public $content;
    public $image;
    //Poruke
    private $message;
    private $errors = array();
    
    //PODESAVA pocetne vrednosti
    public function set_values(array $posts){
        foreach ($posts as $key=>$value){
            if(property_exists($this, $key))
               $this->$key = $value;
        }
    }
    //UPLODUJE SLIKE
    public function upload_image($file){
        $file_name = $file["name"];
        $file_tmp = $file["tmp_name"];
        $file_size = $file["size"];
        $file_type = $file["type"];
        $file_error = $file["error"];
        //Exstenzija fajla
        $file_ext = explode('.', $file_name);
        $file_ext = end($file_ext);
        if(!file_exists(PATH."public/images/recepies/".$file_name) ){
            if($file_ext === "jpg" || $file_ext === "png" || $file_ext === "jpeg"){
                  if($file_size > 0 ){
                    if(move_uploaded_file($file_tmp, PATH."/public/images/recepies/".$file_name)){
                         $this->message = "file successfule uploaded";
                         $this->image = $file["name"];
                    }else{
                        $this->errors[] = "Uploading file faild!"; 
                    }
                  }else{
                      $this->errors[] = "Fail can't be empty!";
                  }
            }else{
                $this->errors[] = "File extension is invalid!";
            }
        }else{
           $this->errors[] = "File alredy exists!"; 
        }
        
        return $this->message?$this->message:false;
    }
    public static function count_all(){
        self::setConnection();
        $table = self::$table;
        $sql = "SELECT COUNT(*) FROM {$table}";
        $results = self::$conn->query($sql);
        $row = $results->fetch(\PDO::FETCH_ASSOC);
        return (int)array_shift($row);
    }
    //VRACA NIZ SA GRESKAMA AKO POSTOJI
    public function errors(){
        return $this->errors;
    }
}
