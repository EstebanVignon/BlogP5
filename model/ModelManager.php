<?php

namespace Model;

class ModelManager
{
    protected $db;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPWD);
    }
}


