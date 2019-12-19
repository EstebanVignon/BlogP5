<?php

class LoginManager
{

    private $db;

    public function __construct()
    {
        $this->db = $db = new PDO('mysql:host=localhost;dbname=ocblog;charset=utf8', 'root', '');
    }

    public function checkCredentials($credentials)
    {
        $db = $this->db;
        $values = $credentials;

        $query = 'SELECT * FROM account WHERE username = :username';
        $req = $db->prepare($query);
        $req->bindValue(':username', $values['username'], PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetch(PDO::FETCH_ASSOC);

        $account = new Account();
        $account->setId($result['id']);
        $account->setUsername($result['username']);
        $account->setPassword($result['password']);
        $account->setIsApproved($result['is_approved']);
        $account->setRole($result['role']);

        return $account;
    }

}
