<?php

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=ocblog;charset=utf8', 'root', '');
    return $db;
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
    $req = $db->prepare($sql);
    $req->execute(array($postId));
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $req->fetchAll();
    return $comments;
}

function getAuthor($postId)
{
    $db = dbConnect();
    $sql = 'SELECT username
            FROM blog_post
            INNER JOIN account on blog_post.account_id = account.id
            WHERE blog_post.id = ?';
    $req = $db->prepare($sql);
    $req->execute(array($postId));
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $author = $req->fetch();
    return $author;
}


function postComment($firstname, $lastname, $content, $email, $blog_post_id)
{
    $db = dbConnect();
    $comment = $db->prepare('INSERT INTO comment(firstname, lastname, content, email, created_at, is_approved, blog_post_id) VALUES(?, ?, ?, ?, NOW(), ?, ?)');
    $affectedLines = $comment->execute(array($firstname, $lastname, $content, $email, 0, $blog_post_id));

    return $affectedLines;
}
