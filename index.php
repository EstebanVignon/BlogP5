<?php
require('controller/frontend.php');
require('controller/backend.php');


try {
    if (isset($_GET['action'])) {

        $action = $_GET['action'];

        //ACTION BLOG
        if ($action == 'blog') {
            blog();
        }
        //ACTION POST
        elseif ($action == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        }
        //ACTION CONTACT
        elseif ($action == 'contact') {
            contact();
        }
        //ACTION ADD COMMENT
        elseif ($action == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['content']) && !empty($_POST['email'])) {
                    addComment($_POST['firstname'], $_POST['lastname'], $_POST['content'], $_POST['email'], $_GET['id']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de post envoyé pour le commentaire');
            }
        }
        //ACTION LOGIN
        elseif ($action = 'login') {
            if (isset($_POST['username']) && isset($_POST['pwd']) && !empty($_POST['username']) && !empty($_POST['pwd'])) {
                if (isset($_POST['submit-connexion'])) {
                    checkLogin($_POST['username'], $_POST['pwd']);
                } else {
                    login(); //GÉRER ICI L'INSCRIPTION UTILISATEUR : registerUser();
                }
            } else {
                login();
            }
        }
        //ACTION ERROR 404
        else {
            throw new Exception('Erreur 404 : Cette page n\'existe pas');
        }
    } else {
        home();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/error.php');
}
