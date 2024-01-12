<?php

namespace App\Controller;

class ErrorController {

  public function index() {
    $this->error();
  }
    public function error(){

        include_once '../app/View/404.php';
    }
  
}