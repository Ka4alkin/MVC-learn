<?php

namespace core;

abstract class Controller
{
    public $route;
    public $view;
    public $model;
    public $acl;

    function __construct($route)
    {
        $this->route = $route;
//        $_SESSION['authorize']['id'] = 1;
//        $_SESSION['admin'] = 1;
        if (!$this->checkAcl()){
            View::errorCode(403);
        }
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
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';

        if ($this->isAcl('all')) {
            return true;
        } elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('authorize')) {
            return true;
        } elseif (!isset($_SESSION['authorize']['id']) and $this->isAcl('quest')) {
            return true;
        } elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
            return true;
        }
        return false;
    }


    public function isAcl($key)
    {
        if ($this->route['action'] && $this->acl[$key]) {
            return in_array($this->route['action'], $this->acl[$key]);
        }
        return false;
    }


}

