<?php
namespace tests;

class testRecepi{
    
    public function testUpload_image(){
        $File = array(
            "fajl"=>array(
                "name"=>"nesto.png",
                "tmp_name"=>"tmp_nesto.png",
                "size"=>9,
                "type"=>"text/html",
                "error"=>0
            )
        );
        $recept = new \libs\Recepi();
        
        try{
            $recept->upload_image($File["fajl"]);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
        
    }
    
}
