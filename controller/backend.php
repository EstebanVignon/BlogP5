<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(MODEL . 'LoginManager.php');

function login()
{
    require(VIEW . 'login.php');
}

function checkLogin($username, $pwd)
{

    $loginManager = new OC\Blog\Model\LoginManager();

    $credentials = $loginManager->checkCredentials($username, $pwd);

    if ($credentials == 'badUser') {
        $loginErrorMessage = 'Cet utilisateur nexiste pas';
    } elseif ($credentials == 'needApproved') {
        $loginErrorMessage = 'Compte connecté mais doit être approuvé';
    } elseif ($credentials == 'connected') {
        $loginErrorMessage = 'Connecté';
        $_SESSION['connexion'] = 1;
    } elseif ($credentials == 'badPassword') {
        $loginErrorMessage = 'Mauvais mdp';
    }

    require(VIEW . 'login.php');
}
