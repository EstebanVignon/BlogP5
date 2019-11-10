<?php

require('./model/frontend.php');

function home()
{
    require('./view/frontend/home.php');
}

function blog()
{
    $posts = getPosts();
    require('./view/frontend/blog.php');
}

function post()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $post = getPost($_GET['id']);
        $comments = getComments($_GET['id']);
        $author = getAuthor($post['account_id']);
        require('./view/frontend/post.php');
    } else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}
