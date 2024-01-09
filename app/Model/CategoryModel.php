<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class CategoryModel{
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
   
   public function create(){
    $conn = $this->db->getConnection();
    $sql = "INSERT INTO `categories`(`name`) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$this->getName()]);
    if($stmt){
        return true;
    }
   }


   public function findAll(){
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `categories` ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if($result){
        return $result;
    }

   }


   public function update($id){
       
    $conn = $this->db->getConnection();
    $sql = "UPDATE `categories`   SET `name` = ?  WHERE `categoryID` = ? ";
    $stmt = $conn->prepare($sql);
    $result=  $stmt->execute([$this->getName(), $id]);
    if($result){
        return true;
    }
   

}

   public function searchByName($searchTerm) {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `categories` WHERE `name` LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["%$searchTerm%"]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
        return $result;
    }
}

public function delete($id) {
    $conn = $this->db->getConnection();
    $sql = "DELETE FROM `categories` WHERE `categoryID` = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);
    return $result;
}
    
}



?>