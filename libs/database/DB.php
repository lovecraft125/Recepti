<?php
namespace libs\database;
use \PDO;
class DB{
    protected static $conn;
    //Uspostavlja konekciju sa bazom
    protected static function setConnection(){
        static::$conn = conn\connection::getInstanc();
        static::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    //Pronalzai sve rekorde
    public static function find_all(){
        static::setConnection();
        $table = static::$table;
        $keyColumn = static::$keyColumn;
        $sql = "SELECT * FROM {$table} ORDER BY {$keyColumn} DESC";
        $result = static::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    //Pronalzai rekord po zadatom id-u
    public static function find_by_id($id){
        static::setConnection();
        $table = static::$table;
        $keyColumn = static::$keyColumn;
        $sql = "SELECT * FROM {$table} WHERE {$keyColumn}={$id}";
        $result = static::$conn->query($sql);
        return $result->fetch(PDO::FETCH_OBJ);
    }
    //Pronalazi rekord po zadatom sql upitu
    public static function find_by_sql($sql){
        static::setConnection();
        $table = static::$table;
        $keyColumn = static::$keyColumn;
        $result = static::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    //Ubacuje rekord u bazu
    public function insert(){
        static::setConnection();
        $table = static::$table;
        $keyColumn = static::$keyColumn;
        $sql = "INSERT INTO {$table} SET ";
        foreach($this as $key=>$value){
            $sql .= $key."=:".$key.",";
        }
        $sql = trim($sql,",");
        $s = static::$conn->prepare($sql);
        foreach ($this as $key=>$value){
            $s->bindValue(":".$key, $value);
        }
        $s->execute();
//        throw new \PDOException();
        return $s->rowCount();
    }
    //Updatuje rekord u bazi 
    public function update($id){
        static::setConnection();
        $table = static::$table;
        $keyColumn = static::$keyColumn;
        $sql = "UPDATE {$table} SET ";
        foreach($this as $key=>$value){
//            if($key == "email")
//                continue;
            $sql .= $key."=:".$key.",";
        } 
        $sql = trim($sql,",");
        $sql .= " WHERE {$keyColumn} = {$id}";
        $s = static::$conn->prepare($sql);
        foreach ($this as $key=>$value){
//            if($key == "email")
//                continue;
            $s->bindValue(":".$key, $value);
        }
        $s->execute();
        throw new PDOException();
        return $s->rowCount();
    }
    //Brise rekord iz baze * TREBA OBRATI PAZNJU
    public function delete($id){
        static::setConnection();
        $table = static::$table;
        $keyColumn = static::$keyColumn;
        $sql = "DELETE FROM {$table} WHERE {$keyColumn}={$id}";
        static::$conn->query($sql);
        throw new PDOException($sql);
        return static::$conn->rowCount();
    }
}
