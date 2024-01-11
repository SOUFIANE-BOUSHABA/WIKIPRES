<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class WikiModel{
    private $db;
    private $name;
    private $urlImg;
    private $title;
    private $content;
    private $author;

    private $categoryId;
    private $tagsId;

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

       public function findAllOfUser(){
        $conn = $this->db->getConnection();
        $id=$_SESSION['user_id'];
        $sql = "SELECT * FROM `wikis` WHERE `deletedAt` IS NULL and userID = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $result;
        }
       }

   public function searchByName($searchTerm) {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `wikis` WHERE `title` LIKE ?  and `deletedAt` IS NULL";
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

public function createWiki($title, $content, $categoryID, $imageFile, $userID){
    $conn = $this->db->getConnection();
    $sql = "INSERT INTO `wikis` (`title`, `content`, `categoryID`, `urlImage`, `userID`, `created_at`, `updated_at`)
    VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
     $stmt = $conn->prepare($sql);
     $result = $stmt->execute([$title, $content, $categoryID, $imageFile, $userID]);
     return $conn->lastInsertId();
}


public function createWikiTAgs( $tagIDs, $wikiid){
    $conn = $this->db->getConnection();
        $sql = "INSERT INTO `wiki_tags` (`wikiID`, `tagID`)
                   VALUES (?, ?)";
     $stmt = $conn->prepare($sql);
     $result = $stmt->execute([$wikiid,$tagIDs]);
     return $result ;
}



public function deleteWiki($id) {
    $conn = $this->db->getConnection();
    $sql = "DELETE FROM `wikis` WHERE `wikiID` = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);

    return $result;
}



public function updateWiki($id, $title, $content, $categoryID, $imageFile) {
    $conn = $this->db->getConnection();
    $sql = "UPDATE `wikis` SET `title` = ?, `content` = ?, `categoryID` = ?, `urlImage` = ?, `updated_at` = CURRENT_TIMESTAMP WHERE `wikiID` = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$title, $content, $categoryID, $imageFile, $id]);
    return $result;
}








public function  findOne($id){
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `wikis`  join users on  wikis.userID =  users.userID WHERE wikiID = ?  and `deletedAt` IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchObject();
    return $result ;
}
  




static public function findFour(){
    $db = new Database();
    $conn = $db->getConnection();
    $sql = "SELECT * FROM `wikis` where `deletedAt` IS NULL ORDER BY wikiID DESC LIMIT 4 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if($result){
        return $result;
    }
}





public function searchByCategory($categoryId) {
    $conn = $this->db->getConnection();

    $sql = "SELECT w.* FROM `wikis` w
            JOIN `categories` wc ON w.`categoryID` = wc.`categoryID`
            WHERE  wc.`categoryID` = ? AND w.`deletedAt` IS NULL";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$categoryId]);

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    if ($result) {
        return $result;
    }
}




}



?>