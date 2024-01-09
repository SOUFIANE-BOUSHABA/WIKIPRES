<?php

namespace App\Controller;
use App\Model\AuthModel;

class AdminController {

    public function index(){
        $adminModel = new AuthModel();

        $userCount = $adminModel->getUserCount();
        $categoryCount = $adminModel->getCategoryCount();
        $tagCount = $adminModel->getTagCount();
        $wikiCount = $adminModel->getWikiCount();

        include_once '../app/View/admin/statistique.php';
    }
    public function category(){
        include_once '../app/View/admin/category.php';
    }
  
}