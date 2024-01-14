<?php

namespace App\Controller;
use App\Model\Tag;

class TagController {

    public function Create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='addtag') {
            $name = $_POST['tag'];
            $tag = new Tag();
            $tag->setName($name);
           if($tag->create()){ 
            $this->getTags();
           } 
           
        } 
    }

    public function getTags(){
         $tag = new Tag();
         $tags=$tag->findAll();
         include_once '../app/View/admin/tags.php';
    }

    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $tag = new Tag();
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
            $tag = new Tag();
            $tag->setName($name);
           if($tag->update($id)){ 
            $this->getTags();
           } 
           
        } 
  
      }

      public function delete() {
        if ($_POST['submit'] == 'delettag') {
            $id= $_POST['id'];
                $tag = new Tag();
                $result = $tag->delete($id);
    
               if ($result) { 
                $this->getTags();
               }
          
        }
    }

    public function getTagsForFormulaire(){
        $tag = new Tag();
       return $tags=$tag->findAll();
   }

   public function getTagsForFilter(){
    $tag = new Tag();
   return $tags=$tag->findAll();
}
  
}

?>