<?php

class Login
{
    public function showLogin()
    {
        $myView = new View('login');
        $myView->setPageTitle('Login Du blog De Esteban Vignon');
        $myView->setPageDesc('Page de connexion du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
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
