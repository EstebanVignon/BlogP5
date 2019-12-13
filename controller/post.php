<?php

require_once(MODEL . 'PostManager.php');
require_once(MODEL . 'CommentManager.php');

$postManager = new OC\Blog\Model\PostManager();
$commentManager = new OC\Blog\Model\CommentManager();

$post = $postManager->getPost($_GET['id']);
$comments = $commentManager->getComments($_GET['id']);
$author = $postManager->getAuthor($_GET['id']);

require(VIEW . 'post.php');
