<?php

namespace OC\Blog\Model;

abstract class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=ocblog;charset=utf8', 'root', '');
        return $db;
    }

    //abstract function getName();
}
