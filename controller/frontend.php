<?php

require_once('./model/PostManager.php');
require_once('./model/CommentManager.php');

function home()
{
    require('./view/frontend/home.php');
}

function blog()
{
    $postManager = new OC\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('./view/frontend/blog.php');
}

function post()
{
    $postManager = new OC\Blog\Model\PostManager();
    $commentManager = new OC\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $author = $postManager->getAuthor($_GET['id']);

    require('./view/frontend/post.php');
}


function addComment($firstname, $lastname, $content, $email, $blog_post_id)
{
    $commentManager = new OC\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($firstname, $lastname, $content, $email, $blog_post_id);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
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
