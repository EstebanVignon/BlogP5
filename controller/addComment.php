<?php

require_once(MODEL . 'CommentManager.php');

$commentManager = new OC\Blog\Model\CommentManager();

$affectedLines = $commentManager->postComment($firstname, $lastname, $content, $email, $blog_post_id);

if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
} else {
    header('Location: index.php?action=post&id=' . $blog_post_id);
}
