<?php 
namespace App\Model;
use PDO;
use App\Database;
class ArticlesModel {
   
        public function __construct(private Database $db){

    }

    public function runQuery(){
        $pdo = $this->db->getconnection();
        $statement = $pdo->query("SELECT * FROM articles where aid = 74");
        dump($statement);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
   
}