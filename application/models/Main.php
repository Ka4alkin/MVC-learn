<?php

namespace models;

use core\Model;

class Main extends Model
{
    public function getNews()
    {
        return $this->db->row('SELECT title, description FROM newstest');

    }
}