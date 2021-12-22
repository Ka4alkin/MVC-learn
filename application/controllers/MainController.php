<?php

namespace controllers;

use core\Controller;
use lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {

        $result = $this->model->getNews();


        $vars = [
            'news' => $result,
        ];

        $this->view->render('Главная страница', $vars);


    }

}