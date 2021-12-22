<?php

namespace core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }


        $this->run();
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $param) {
            if (preg_match($route, $url)) {
                $this->params = $param;
                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if ($this->match()) {

            $pathClass = 'controllers\\' . ucfirst($this->params['controller']) . 'Controller';


            if (class_exists($pathClass)) {

                $action = $this->params['action'] . 'Action';

                echo $pathClass . 'НАЙДЕН';

                /*$controller = new $pathClass;*/
                $controller = new $pathClass($this->params);
                if (method_exists($pathClass,$action)){
                    $controller->$action();
                }

            } else {
                /*echo `route ${$pathClass} NOT found`;*/
                View::errorCode(404);
            }
        } else {
            /*echo 'route NOT found';*/
            View::errorCode(404);
        }


    }
}


