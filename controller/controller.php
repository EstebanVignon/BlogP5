<?php

require('./model/model.php');

function home()
{
    require('./view/indexView.php');
}

function blog()
{
    $posts = getPosts();
    require('./view/blogView.php');
}

function post()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $post = getPost($_GET['id']);
        $comments = getComments($_GET['id']);
        $author = getAuthor($post['account_id']);
        require('./view/postView.php');
    } else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}
