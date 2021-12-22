<?php

namespace controllers;

use core\Controller;

class AccountController extends Controller
{
    public function before(){
        $this->view->layout = 'custom';
    }

    public function loginAction()
    {
        $this->view->render('Регистрация');
    }

    public function registerAction()
    {
        /*$this->view->pathToView = 'другой путь';*/
        /*$this->view->layout = 'другой путь';*/
        $this->view->render('Логин');
    }
}