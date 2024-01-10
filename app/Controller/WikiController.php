<?php

namespace App\Controller;
use App\Model\WikiModel;

class WikiController {

    public function getWikis(){

     

        $wiki = new WikiModel();
        $wikis = $wiki->findAll();
   
      
        $category = new CategoryController();
        $categoreis = $category->getCategoriesFourFormulaire(); 
        
        $tag = new TagController();
        $tags = $tag->getTagsForFormulaire(); 
   
        include_once '../app/View/admin/wikis.php';
   }

    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $wiki = new WikiModel();
            $searchResults = $wiki->searchByName($searchTerm);
        if($searchResults){
            include_once '../app/View/admin/includesAjax/wikis.php';
            exit(); 
        }
            
      }
    }

    public function archiver() {
        if ($_POST['submit'] == 'archiverwiki') {
            $id = $_POST['id'];
            $wiki = new WikiModel();
            $result = $wiki->archiver($id);
    
            if ($result) {
                header("Location: ?uri=wiki/getWikis");
                exit();
            }
        }
    }
    public function getWikisForUser(){
        $wiki = new WikiModel();
        $wikis=$wiki->findAll();
        include_once '../app/View/user/wikis.php';
   }


   
   public function searchtwo() {
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $wiki = new WikiModel();
        $searchResults = $wiki->searchByName($searchTerm);
    if($searchResults){
        include_once '../app/View/user/includesAjax/wiki.php';
        exit(); 
    }
        
  }
}
   
}


?>