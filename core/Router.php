<?php

class Router
{
    private $controller = 'App\Controller\UserController';
    private $method = 'index';
    private $param = [];

    public function __construct()
    {
        $this->router();
    }

    public function router()
    {
        if (empty($_GET['uri'])) {
            $uri = '';
        } else {
            $uri = $_GET['uri'];
        }

        $uri = explode('/', trim($uri, '/'));
        if (!empty($uri[0])) {
            $controller = 'App\Controller\\' . $uri[0] . 'Controller';
            unset($uri[0]);
            if (class_exists($controller)) {
                $this->controller = $controller;
            } else {
                $controller = 'App\Controller\ErrorController';
                $this->controller = $controller;
            }
        }

        if (isset($uri[1])) {
            $method = $uri[1];
            unset($uri[1]);
            if (method_exists($this->controller, $method)) {
                $this->method = $method;
            } else {
                $controller = 'App\Controller\ErrorController';
                $this->controller = $controller;
            }
        }

        $object = new $this->controller;

        if (isset($uri[2])) {
            $param = array_values($uri);
            $this->param = $param;
        }

        call_user_func_array([$object, $this->method], $this->param);

    }
   
}