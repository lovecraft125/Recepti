<?php
namespace tests;

class testAuthor{
    //TEST ZA POSTAVLJANJE VREDNOSTI
    public function testSetValues(){
        $author = new \libs\Author();
        $values = array(
            "first_name"=>"Mario",
            "last_name"=>"Jakobac",
            "email"=>"mario@gmail.com",
            "password"=>hash("sha256", "mario")
        );
        
        try{
            $author->set_values($values);
        }catch(\Exception $e){
            echo $e->getMessage()." ".$e->getLine();
        }
        return $author;
    }
    //TEST ZA UBACIVANJE VREDNOSTI U BAZU
    public function testInsert(){
        $author = new \libs\Author();
        $values = array(
            "first_name"=>"Mario",
            "last_name"=>"Jakobac",
            "email"=>"mario@gmail.com",
            "password"=>hash("sha256", "mario")
        );
        $result = $author->set_values($values);
        try{
           $author->insert();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $author;
    }
    //TEST ZA UPDATE
    public function testUpdate(){
        $author = new \libs\Author();
        $values = array(
            "first_name"=>"Antonio",
            "last_name"=>"Jakobac",
            "email"=>"h.p.lovecraft125@gmail.com",
            "password"=>hash("sha256", "codename47")
        );
        $result = $author->set_values($values);
        try{
           $author->update(2);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
       
        return $author;
    }
    //TEST ZA DELETE
    public function testDelete(){
        $author = new \libs\Author();
        try{
            $author->delete(9);
        }catch(PDOException $e){
            echo $e->getMessage().' '.$e->getLine();
        }
    }
}
