<?php

class ModelManager
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPWD);
    }

    public function delete(object $obj)
    {
        $db = $this->db;
        $tableName = $obj->getTableName();
        $id = (int)$obj->getId();

        $query = 'DELETE FROM ' . $tableName . ' WHERE id = :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
}