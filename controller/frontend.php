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
        $author = getAuthor($_GET['id']);
        require('./view/frontend/post.php');
    } else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }
}


function addComment($firstname, $lastname, $content, $email, $blog_post_id)
{
    $affectedLines = postComment($firstname, $lastname, $content, $email, $blog_post_id);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $blog_post_id);
    }
}









function contact()
{
    if (
        empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['message']) ||
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
        header('Location: index.php');
    }

    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email = strip_tags(htmlspecialchars($_POST['email']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    $to = "vignon.esteban@gmail.com";
    $subject = "Formulaire de contact Site CV :  $name";
    $body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
    $header = "From: vignon.esteban@gmail.com";
    $header .= "Reply-To: $email";

    mail($to, $subject, $body, $header);

    header('Location: index.php');
}
