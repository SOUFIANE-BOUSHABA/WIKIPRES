<?php

namespace App\Controller;
use App\Model\TagModel;

class TagController {

    public function Create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='addtag') {
            $name = $_POST['tag'];
            $tag = new TagModel();
            $tag->setName($name);
           if($tag->create()){ 
            $this->getTags();
           } 
           
        } 
    }

    public function getTags(){
         $tag = new TagModel();
         $tags=$tag->findAll();
         include_once '../app/View/admin/tags.php';
    }

    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $tag = new TagModel();
            $searchResults = $tag->searchByName($searchTerm);
        if($searchResults){
            include_once '../app/View/admin/includesAjax/tags.php';
            exit(); 
        }
            
        }
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='modifierTag') {
            $name = $_POST['tag'];
            $id= $_POST['id'];
            $tag = new TagModel();
            $tag->setName($name);
           if($tag->update($id)){ 
            $this->getTags();
           } 
           
        } 
  
      }

      public function delete() {
        if ($_POST['submit'] == 'delettag') {
            $id= $_POST['id'];
                $tag = new TagModel();
                $result = $tag->delete($id);
    
               if ($result) { 
                $this->getTags();
               }
          
        }
    }
  
}

?>