<?php

namespace App\Controller;
use App\Model\UserModel;

class UserController {

    public function index(){
      include "../app/View/user/home.php";
    }

    public function getwikis(){
        include "../app/View/user/wikis.php";
      }
  
}