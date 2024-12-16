<?php
namespace App;
use PDO;

class Database{

 
    public function __construct(private string $host, private String $db, private string $username, private string $password){
        
    }
    public function getConnection (){
        
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8;port=3306";
        $pdo = new PDO($dsn , $this->username, $this->password, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        print " database is connected";
        return $pdo;
    }
}