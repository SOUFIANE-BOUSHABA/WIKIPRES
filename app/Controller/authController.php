<?php

namespace App\Controller;
use App\Model\User;

class AuthController {

    public function index(){
      include "../app/View/auth/login.php";
    }

    public function register(){
        include "../app/View/auth/register.php";
      }

      public function registration() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='regester') {
          $firstname = htmlspecialchars($_POST['firstname']);
          $lastname = htmlspecialchars($_POST['lastname']);
          $email = htmlspecialchars($_POST['email']);
          $password = htmlspecialchars($_POST['password']);
            $errors = [];

            if (empty($firstname) || empty($lastname) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
              $errors['general'] = "Veuillez remplir tous les champs correctement.";
          }
          
          if(empty($errors)){
            $newUser = new User();
            $newUser->setFirstname($firstname);
            $newUser->setLastname($lastname);
            $newUser->setEmail($email);
            $newUser->setPassword($password);
           if($newUser->registerUser()){
             MailerController::sendMail($newUser->getEmail(),'regestration','bonjour monsieur '.$newUser->getFirstname().' '.$newUser->getLastname());
            include "../app/View/auth/login.php";
           } 
           
        } else{
          echo $errors['general'];
          }
          
      }
    }

    public function loginUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='login') {
          $email = htmlspecialchars($_POST['email']);
          $password = htmlspecialchars($_POST['password']);

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
              $errors['general'] = "Veuillez remplir tous les champs correctement.";
          }

          if(empty($errors)){
            $loginUser = new User();
            $user=$loginUser->loginUser($email , $password);
            if($user){
              
              
                $_SESSION['email']= $user->email;
                $_SESSION['first']= $user->first_name;
                $_SESSION['last']=$user->laste_name;
                $_SESSION['role']=$user->role;
                $_SESSION['user_id']=$user->userID;
                if ($user->role == 'admin') {
                  header('Location:?uri=admin'); 
                  exit();
              } elseif ($user->role == 'author') {
                  header('Location:?uri=wiki/getWikis');
                  exit();
              }

           } else {
            include_once '../app/View/auth/login.php';
           }
          }
           
        } 
    }
    public function logoutUser() {
      $_SESSION = array();
      session_destroy();
      header('Location: ?uri=auth'); 
      exit();
  }
  
    
  
}