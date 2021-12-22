<?php

namespace controllers;

use core\Controller;

class TestController extends Controller
{

    /*function __construct($route)
    {
        parent::__construct($route);
    }*/

    public function testAction(){
        $this->view->render('Tест');

     }

}