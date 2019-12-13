<?php

require_once(MODEL . 'PostManager.php');

$postManager = new OC\Blog\Model\PostManager();
$posts = $postManager->getPosts();

require(VIEW . 'blog.php');
