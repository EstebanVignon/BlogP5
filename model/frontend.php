<?php

function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=ocblog;charset=utf8', 'root', '');
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getPosts()
{
    $db = dbConnect();
    $sql = 'SELECT * 
            FROM blog_post 
            ORDER BY created_at 
            DESC LIMIT 0, 5';
    $req = $db->query($sql);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $sql = 'SELECT * 
            FROM blog_post 
            WHERE id = ?';
    $req = $db->prepare($sql);
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $sql = 'SELECT *
            FROM comment
            WHERE blog_post_id = ? 
            ORDER BY created_at
            DESC';
    $comments = $db->prepare($sql);
    $comments->execute(array($postId));
    return $comments;
}

function getAuthor($accountId)
{
    $db = dbConnect();
    $sql = 'SELECT id, username
            FROM account 
            WHERE id = ?';
    $req = $db->prepare($sql);
    $req->execute(array($accountId));
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $author = $req->fetch();
    return $author;
}

