<?php

namespace App\Controller;
use App\Model\CategoryModel;

class CategoryController {

    public function Create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='addCategorie') {
            $name = $_POST['category'];
            $category = new CategoryModel();
            $category->setName($name);
           if($category->create()){ 
            $this->getCategories();
           } 
           
        } 
    }

    public function getCategories(){
         $category = new CategoryModel();
         $categoreis=$category->findAll();
         include_once '../app/View/admin/category.php';
    }

    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $category = new CategoryModel();
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
            $category = new CategoryModel();
            $category->setName($name);
           if($category->update($id)){ 
            $this->getCategories();
           } 
           
        } 
  
      }

      public function delete() {
        if ($_POST['submit'] == 'deletcategory') {
            $id= $_POST['id'];
                $category = new CategoryModel();
                $result = $category->delete($id);
    
               if ($result) { 
                $this->getCategories();
               }
          
        }
    }
  
}

?>