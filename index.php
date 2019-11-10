<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'blog') {
        blog();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    home();
}