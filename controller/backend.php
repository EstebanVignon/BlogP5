<?php

require_once('./model/LoginManager.php');

function login($loginErrorMessage = null)
{
    $showError = $loginErrorMessage;
    require('./view/backend/login.php');
}

function checkLogin($username, $pwd)
{

    $loginManager = new OC\Blog\Model\LoginManager();

    $credentials = $loginManager->checkCredentials($username, $pwd);

    if ($credentials == 'badUser') {
        $loginErrorMessage = 'Cet utilisateur nexiste pas';
    } elseif ($credentials == 'connected') {
        $loginErrorMessage = 'Connecté';
    } elseif ($credentials == 'badPassword') {
        $loginErrorMessage = 'Mauvais mdp';
    }

    require('./view/backend/login.php');
}
