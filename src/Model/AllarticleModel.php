<?php 
namespace App\Model;
use PDO;
use App\Database;
class AllarticleModel {
   
        public function __construct(private Database $db){

    }

    public function runQuery(){
        $pdo = $this->db->getconnection();
        $statement = $pdo->query("SELECT * FROM articles");
        // dump($statement);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
   
}