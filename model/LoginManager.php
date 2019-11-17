<?php

namespace OC\Blog\Model;

require_once('Manager.php');

class LoginManager extends Manager
{

    public function checkCredentials($username, $pwd)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM account WHERE username = ?';
        $req = $db->prepare($sql);
        $req->execute(array($username));
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $usernameReq = $req->fetchAll();

        if (!empty($usernameReq[0]['password'])) {
            if (password_verify($pwd, $usernameReq[0]['password'])) {
                if ($usernameReq[0]['is_approved'] == null) {
                    return 'needApproved';
                } else {
                    return 'connected';
                }
            } else {
                return 'badPassword';
            }
        } else {
            return 'badUser';
        }
    }
}
