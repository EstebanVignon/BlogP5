<?php

namespace OC\Blog\Model;

require_once('Manager.php');

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM comment 
                WHERE blog_post_id = ? 
                ORDER BY created_at DESC';
        $req = $db->prepare($sql);
        $req->execute(array($postId));
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $comments = $req->fetchAll();
        return $comments;
    }

    public function postComment($firstname, $lastname, $content, $email, $blog_post_id)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO comment(firstname, lastname, content, email, created_at, is_approved, blog_post_id) 
                                 VALUES(?, ?, ?, ?, NOW(), ?, ?)');
        $affectedLines = $comment->execute(array($firstname, $lastname, $content, $email, 0, $blog_post_id));
        return $affectedLines;
    }
}
