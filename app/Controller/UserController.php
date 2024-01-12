<?php

namespace App\Controller;
use App\Model\CategoryModel;
use App\Model\WikiModel;

class UserController {

    public function index(){
      $categoreis = CategoryModel::findFour();
      $wikis = WikiModel::findFour();
      include "../app/View/user/home.php";
    }

    public function getwikis(){
        include "../app/View/user/wikis.php";
      }
  
}