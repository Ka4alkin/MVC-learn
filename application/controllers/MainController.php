<?php

namespace controllers;

use core\Controller;
use lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {

        $db = new Db();

        $paramsDbPdo = [
            'id' => 2,
        ];

        $data = $db->column('SELECT name FROM testtable WHERE id = :id', $paramsDbPdo);

        echo '<pre style="display: none" id="kl_look">';
        print_r($data);
        echo '</pre>';

        /*$vars = [
            'name' => 'Вася',
            'age' => 88,
            'array' => [1, 2, 3]
        ];*/

        $this->view->render('Главная страница'/*, $vars*/);


    }

}