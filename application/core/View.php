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
}