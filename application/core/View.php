<?php

namespace core;

class View
{
    public $route;
    public $pathToView;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->pathToView = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = [])
    {
//        echo '<pre style="display: none" id="kl_look">';
//        print_r($vars);
//        echo '</pre>';
        extract($vars);


        $pathView = 'application/views/' . $this->pathToView . '.php';
        $pathLayout = 'application/views/layouts/' . $this->layout . '.php';

        if (file_exists($pathView)) {
            ob_start();
            require $pathView;
            $content = ob_get_clean();
        } else {
            echo '<br>Вид не найден' . $pathView;
        }


        if (file_exists($pathLayout)) {
            require $pathLayout;
        } else {
            echo 'Вид не найден' . $pathLayout;
        }
    }

    public static function errorCode($code){
        /*http_response_code($code);*/
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)){
            require $path;
        }
        die();
    }

    public function redirect($url){
        header('location: '.$url);
        die();
    }

}