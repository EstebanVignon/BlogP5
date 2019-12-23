<?php

class ModelManager
{
    protected $db;

    public function __construct()
    {
        $this->db = $db = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8', '' . DBUSERNAME . '', '' . DBPWD . '');
    }

    public function delete($obj)
    {
        $db = $this->db;
        $query = ' DELETE FROM ' . $obj->getTableName() . ' WHERE id = ' . $obj->getId();
        $req = $db->prepare($query);
        $req->execute();
    }

}