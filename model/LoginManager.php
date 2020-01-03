<?php

class LoginManager extends ModelManager
{
    public function checkCredentials($credentials)
    {
        $db = $this->db;

        $query = 'SELECT * FROM account WHERE username = :username';
        $req = $db->prepare($query);
        $req->bindValue(':username', $credentials['username'], PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetch(PDO::FETCH_ASSOC);

        $account = new Account();
        $account->setId($result['id']);
        $account->setUsername($result['username']);
        $account->setPassword($result['password']);
        $account->setApproved($result['is_approved']);
        $account->setRole($result['role']);

        return $account;
    }

}

