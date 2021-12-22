<?php

namespace core;

abstract class Controller
{
    public $route;
    public $view;
    public $model;

    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        /*$this->before();*/


        $this->model = $this->loadModel($route['controller']);


    }

    public function loadModel($name)
    {
        $path = 'models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
        return false;
    }

    public function checkAcl()
    {
        $acl = require 'application/acl/' . $this->route['controller'];

        echo '<pre style="display: none" id="kl_look">';
        print_r($acl);
        echo '</pre>';
    }


}

