<?php

class Login extends Controller
{
    public function showLogin($request)
    {
        if (isset($this->userRole)) {
            $this->redirect('dashboard');
        }
        $this->render('_login.php', array(),
            'Login Du blog De Esteban Vignon',
            'Page de connexion du Blog De Esteban Vignon - Développeur PHP');
    }

    public function logout($request)
    {
        session_destroy();
        $this->redirect('home');
    }

    public function checkLogin($request)
    {
        $title = 'Login Du blog De Esteban Vignon';
        $desc = 'Page de connexion du Blog De Esteban Vignon - Développeur PHP';
        if (!empty($request['submit-connexion']) && $request['submit-connexion'] == 1) {
            if (empty($request['password']) && empty($request['username'])) {
                $this->render('_login.php', array('errorMessage' => 'Nom d\'utilisateur et mot de passe vide'), $title, $desc);
            } elseif (empty($request['password'])) {
                $this->render('_login.php', array('errorMessage' => 'Mot de passe vide'), $title, $desc);
            } elseif (empty($request['username'])) {
                $this->render('_login.php', array('errorMessage' => 'Nom d\'utilisateur vide'), $title, $desc);
            } else {
                $manager = new LoginManager();
                $account = $manager->checkCredentials($request);
                if ($account->getUsername() === NULL) {
                    $this->render('_login.php', array('errorMessage' => 'Le nom d\'utilisateur n\'existe pas'), $title, $desc);
                } elseif (password_verify($request['password'], $account->getPassword())) {
                    $this->sessionManager->initSession($account);
                    $this->redirect('dashboard');
                } else {
                    $this->render('_login.php', array('errorMessage' => 'Bonjour ' . $account->getUsername() . ', votre mot de passe est incorrect'), $title, $desc);
                }
            }
        } elseif (!empty($values['submit-register']) && $values['submit-register'] == 1) {
            $this->render('_login.php', array('errorMessage' => 'PAS ENCORE POSSIBLE DE SINSCRIRE'), $title, $desc);
        }
    }


}