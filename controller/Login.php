<?php

class Login
{
    public function showLogin()
    {
        require(VIEW . 'login.php');
    }

    public function checkLogin($username, $pwd)
    {
        $loginManager = new OC\Blog\Model\LoginManager();
        $credentials = $loginManager->checkCredentials($username, $pwd);
        if ($credentials == 'badUser') {
            $loginErrorMessage = 'Cet utilisateur nexiste pas';
        } elseif ($credentials == 'needApproved') {
            $loginErrorMessage = 'Compte connecté mais doit être approuvé';
        } elseif ($credentials == 'connected') {
            $loginErrorMessage = 'Connecté';
        } elseif ($credentials == 'badPassword') {
            $loginErrorMessage = 'Mauvais mdp';
        }
        require('./view/backend/login.php');
    }
}
