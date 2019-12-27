<?php

class Login
{

    public function showLogin($params)
    {
        if (isset($_SESSION['role'])) {
            $view = new View();
            $view->redirect('dashboard');
            exit;
        }
        $myView = new View('_login');
        $myView->setPageTitle('Login Du blog De Esteban Vignon');
        $myView->setPageDesc('Page de connexion du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function checkLogin($params)
    {
        $values = $_POST['values'];

        if (!empty($values['submit-connexion']) && $values['submit-connexion'] == 1) {
            if (empty($values['password']) && empty($values['username'])) {
                $myView = new View('_login');
                $myView->render(array('errorMessage' => 'Nom d\'utilisateur et mot de passe vide'));
            } elseif (empty($values['password'])) {
                $myView = new View('_login');
                $myView->render(array('errorMessage' => 'Mot de passe vide'));
            } elseif (empty($values['username'])) {
                $myView = new View('_login');
                $myView->render(array('errorMessage' => 'Nom d\'utilisateur vide'));
            } else {
                $manager = new LoginManager();
                $account = $manager->checkCredentials($values);

                if ($account->getUsername() === NULL) {
                    $myView = new View('_login');
                    $myView->render(array('errorMessage' => 'Le nom d\'utilisateur n\'existe pas'));
                } elseif (password_verify($values['password'], $account->getPassword())) {

                    $_SESSION['role'] = $account->getRole();
                    $_SESSION['username'] = $account->getUsername();
                    $_SESSION['isApproved'] = $account->getIsApproved();
                    $_SESSION['id'] = $account->getId();

                    $view = new View();
                    $view->redirect('dashboard');
                } else {
                    $myView = new View('_login');
                    $myView->render(array('errorMessage' => 'Bonjour ' . $account->getUsername() . ', votre mot de passe est incorrect'));
                }
            }
        } elseif (!empty($values['submit-register']) && $values['submit-register'] == 1) {
            $myView = new View('_login');
            $myView->render(array('errorMessage' => 'PAS ENCORE POSSIBLE DE SINSCRIRE'));
        }
    }

    public function logout($params)
    {
        session_destroy();
        $view = new View();
        $view->redirect('home');
    }

}