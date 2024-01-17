<?php

namespace App\Controller;
use App\Model\Category;

class CategoryController {

    public function Create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='addCategorie') {
            $name = $_POST['category'];
            $category = new Category();
            $category->setName($name);
           if($category->create()){ 
            $this->getCategories();
           } 
           
        } 
    }

    public function getCategories(){
         $category = new Category();
         $categoreis=$category->findAll();
         include_once '../app/View/admin/category.php';
    }

    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $category = new Category();
            $searchResults = $category->searchByName($searchTerm);
        if($searchResults){
            include_once '../app/View/admin/includesAjax/category.php';
            exit(); 
        }
            
        }
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='modifierCategorie') {
            $name = $_POST['category'];
            $id= $_POST['id'];
            $category = new Category();
            $category->setName($name);
           if($category->update($id)){ 
            $this->getCategories();
           } 
           
        } 
  
      }

      public function delete() {
        if ($_POST['submit'] == 'deletcategory') {
            $id= $_POST['id'];
                $category = new Category();
                $result = $category->delete($id);
    
               if ($result) { 
                $this->getCategories();
               }
          
        }
    }
  


   public function getCategoriesFourFormulaire(){
    $category = new Category();
    return  $categoreis=$category->findAll();
}

public function getCategoriesFourFilter(){
    $category = new Category();
    return  $categoreis=$category->findAll();
}


}

?>