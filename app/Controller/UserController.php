<?php

namespace App\Controller;
use App\Model\Category;
use App\Model\Wiki;

class UserController {

    public function index(){
      $categoreis = Category::findFour();
      $wikis = Wiki::findFour();
      include "../app/View/user/home.php";
    }

    public function getwikis(){
        include "../app/View/user/wikis.php";
      }
  
}