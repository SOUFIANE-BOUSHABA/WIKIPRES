<?php

namespace App\Controller;
use App\Model\Wiki;

class WikiController {

    public function getWikis(){

     

        $wiki = new Wiki();
        $wikis = $wiki->findAll();
   
        $wikisforuser = $wiki->findAllOfUser();
        $category = new CategoryController();
        $categoreis = $category->getCategoriesFourFormulaire(); 
        
        $tag = new TagController();
        $tags = $tag->getTagsForFormulaire(); 
   
        include_once '../app/View/admin/wikis.php';
   }


    public function archiver() {
        if ($_POST['submit'] == 'archiverwiki') {
            $id = $_POST['id'];
            $wiki = new Wiki();
            $result = $wiki->archiver($id);
    
            if ($result) {
                header("Location: ?uri=wiki/getWikis");
                exit();
            }
        }
    }
    public function getWikisForUser(){
        $wiki = new Wiki();
        $wikis=$wiki->findAll();

        $category = new CategoryController();
        $categoreis = $category->getCategoriesFourFilter(); 

        $tag = new TagController();
        $tags = $tag->getTagsForFilter(); 
   
        include_once '../app/View/user/wikis.php';
   }


   
   public function searchtwo() {
    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $wiki = new Wiki();
        $searchResults = $wiki->searchByName($searchTerm);
    if($searchResults){
        include_once '../app/View/user/includesAjax/wiki.php';
    }
        
  }
}

public function create() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryID = $_POST['categoryID'];
        $tagIDs = isset($_POST['tagIDs']) ? $_POST['tagIDs'] : [];

        $userID = $_SESSION['user_id'];

        $imageFile = null;
        if ($_FILES['urlImage']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = './upload/';
            $uploadedFile = $uploadDir . basename($_FILES['urlImage']['name']);

            if (move_uploaded_file($_FILES['urlImage']['tmp_name'], $uploadedFile)) {
                $imageFile = $uploadedFile;
            } else {
                echo 'File upload failed.';
            }
        }

        $wikiModel = new Wiki();

        if (isset($_POST['id'])) {
            $wikiID = $_POST['id'];
            $result = $wikiModel->updateWiki($wikiID, $title, $content, $categoryID, $imageFile);
        } else {
            $wikiID = $wikiModel->createWiki($title, $content, $categoryID, $imageFile, $userID);
            foreach ($tagIDs as $tagID) {
                $wikiModel->createWikiTAgs($tagID, $wikiID);
            }
        }

        header('location:?uri=wiki/getWikis');
    }
}


public function deleteWiki() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'deletewiki') {
        $id = $_POST['id'];

        $wiki = new Wiki();
        $result = $wiki->deleteWiki($id);

        if ($result) {
            header("Location: ?uri=wiki/getWikis");
            exit();
        }
    }
}





public function detailwiki($id){
    $wikiModel = new Wiki();
    $wikis= $wikiModel->findOne($id);
    include_once '../app/View/user/detailwiki.php';
}








public function searchByCategory() {
    if (isset($_GET['category'])) {
        $categoryId = $_GET['category'];

        $wiki = new Wiki();
        $searchResults = $wiki->searchByCategory($categoryId);

        if ($searchResults) {
            include_once '../app/View/user/includesAjax/wiki.php';
        }
    }
}


public function searchByTag(){
    if (isset($_GET['tag'])) {
        $tagId = $_GET['tag'];

        $wiki = new Wiki();
        $searchResults = $wiki->searchByTag($tagId);

        if ($searchResults) {
            include_once '../app/View/user/includesAjax/wiki.php';
        }
    }
}
   
}


?>