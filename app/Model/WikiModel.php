<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class WikiModel{
    private $db;
    private $name;

    public function __construct() {
        $this->db = new Database();
    }
    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
       return $this->name;
    }
   
    public function findAll(){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM `wikis` WHERE `deletedAt` IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $result;
        }
    
       }

   public function searchByName($searchTerm) {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `wikis` WHERE `title` LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["%$searchTerm%"]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
        return $result;
    }
}

public function archiver($id) {
    $conn = $this->db->getConnection();
    $sql = "UPDATE `wikis` SET `deletedAt` = CURRENT_TIMESTAMP WHERE `wikiID` = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);
    return $result;
}
    
}



?>