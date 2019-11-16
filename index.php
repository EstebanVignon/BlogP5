<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'blog') {
        blog();
    } elseif ($action == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    } elseif ($action == 'contact') {
        contact();
    } elseif ($action == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['content']) && !empty($_POST['email'])){
                addComment($_POST['firstname'], $_POST['lastname'], $_POST['content'], $_POST['email'], $_GET['id']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    
    else {
        echo 'Erreur 404 : Cette page n\'existe pas';
    }
} else {
    home();
}
