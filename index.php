<?php
require('controller/frontend.php');


try {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == 'blog') {
            blog();
        } elseif ($action == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($action == 'contact') {
            contact();
        } elseif ($action == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['content']) && !empty($_POST['email'])) {
                    addComment($_POST['firstname'], $_POST['lastname'], $_POST['content'], $_POST['email'], $_GET['id']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de post envoyé pour le commentaire');
            }
        } else {
            throw new Exception('Erreur 404 : Cette page n\'existe pas');
        }
    } else {
        home();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/error.php');
}
