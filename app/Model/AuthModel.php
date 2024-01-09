<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class AuthModel {
    private $db;

    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role_id;

    public function __construct() {
        $this->db = new Database();
    }
    public function setFirstname($firstname){
        $this->firstname=$firstname;
    }
    public function getFirstname(){
       return $this->firstname;
    }
    public function setLastname($lastname){
        $this->lastname=$lastname;
    }
    public function getLastname(){
       return $this->lastname;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
       return $this->email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
       return $this->password;
    }
   


    public function registerUser() {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO `users`( `first_name`, `laste_name`, `password`, `email`, `role`) VALUES (?, ?, ?, ? ,?)";
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getFirstname(), $this->getLastname(), $hashedPassword , $this->getEmail(), 'author']);
        if($stmt){
            return true;
        }
    }
   
 
    public function loginUser($email , $password){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM `users` where email = ?";
        $stmt = $conn->prepare($sql);
       
        $stmt->execute([$email]);
        $result = $stmt->fetchObject();
        if ($result && password_verify($password, $result->password)) {

            return $result;
           
        } else {
            return false; 
        }
    }

    public function getUserCount()
    {  $conn = $this->db->getConnection();

        $sql = "SELECT COUNT(*) as userCount FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategoryCount()
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT COUNT(*) as categoryCount FROM categories";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTagCount()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) as tagCount FROM tags";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getWikiCount()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) as wikiCount FROM wikis";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}



?>