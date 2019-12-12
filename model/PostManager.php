<?php

namespace OC\Blog\Model;

require_once(MODEL . 'Manager.php');

class PostManager extends Manager
{
    /*
    public function getName(){

    }*/

    public function getPosts()
    {
        $db = $this->dbConnect();
        $sql = 'SELECT * 
            FROM blog_post 
            ORDER BY created_at 
            DESC LIMIT 0, 5';
        $req = $db->query($sql);
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT * 
            FROM blog_post 
            WHERE id = ?';
        $req = $db->prepare($sql);
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function getAuthor($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT username
            FROM blog_post bp
            INNER JOIN account a 
            ON bp.account_id = a.id
            WHERE bp.id = ?';
        $req = $db->prepare($sql);
        $req->execute(array($postId));
        $req->setFetchMode(\PDO::FETCH_ASSOC);
        $author = $req->fetch();
        return $author;
    }
}
