<?php

namespace controllers;

use core\Controller;
use lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {

        $db = new Db();

        $g = $db->row('SELECT name FROM testtable');

//        WHERE id = 1

        echo '<pre style="display: none" id="kl_look">';
        print_r($g);
        echo '</pre>';

        /*$vars = [
            'name' => 'Вася',
            'age' => 88,
            'array' => [1, 2, 3]
        ];*/

        $this->view->render('Главная страница'/*, $vars*/);


    }

}