<?php

namespace core;

use lib\Db;

abstract class Model
{
    public $db;

    function __construct()
    {

        $this->db = new Db();


    }
}