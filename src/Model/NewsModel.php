<?php 
namespace App\Model;
use PDO;
class NewsModel {

    public function runQuery(){

        $dsn = "mysql:host=db;dbname=db;charset=utf8;port=3306";
        $pdo = new PDO($dsn , "db", "db", [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $statement = $pdo->query("SELECT * FROM articles where aid = 70");
        // dump($statement);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
   
}
