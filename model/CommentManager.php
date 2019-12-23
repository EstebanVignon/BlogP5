<?php

class CommentManager extends ModelManager
{

    public function find($commentId)
    {
        $id = $commentId;
        $db = $this->db;
        $query = 'SELECT *
                  FROM comment
                  WHERE comment.id = :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setUsername($row['username']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['created_at']);
        $comment->setIsApproved($row['is_approved']);
        $comment->setBlogPostId($row['blog_post_id']);

        return $comment;
    }

    public function findAll()
    {
        $comments = [];
        $db = $this->db;

        $query = 'SELECT account.username, comment.id, comment.content, comment.created_at, comment.is_approved, comment.blog_post_id
                  FROM comment
                  INNER JOIN account
                  ON comment.account_id = account.id
                  ORDER BY created_at DESC';
        $req = $db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setUsername($row['username']);
            $comment->setContent($row['content']);
            $comment->setCreatedAt($row['created_at']);
            $comment->setIsApproved($row['is_approved']);
            $comment->setBlogPostId($row['blog_post_id']);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function findUserComments()
    {
        $db = $this->db;
        $userId = $_SESSION['id'];
        $comments = [];

        $query = "SELECT account.username, comment.id, comment.content, comment.created_at, comment.is_approved, comment.blog_post_id
                  FROM comment
                  INNER JOIN account
                  ON comment.account_id = account.id
                  WHERE account.id = :userId
                  ORDER BY created_at DESC";
        $req = $db->prepare($query);
        $req->bindValue(':userId', $userId, PDO::PARAM_INT);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setUsername($row['username']);
            $comment->setContent($row['content']);
            $comment->setCreatedAt($row['created_at']);
            $comment->setIsApproved($row['is_approved']);
            $comment->setBlogPostId($row['blog_post_id']);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function findBlogPostComments($postId)
    {
        $db = $this->db;
        $id = $postId;
        $comments = [];

        $query = 'SELECT *
                  FROM comment
                  INNER JOIN account
                  ON comment.account_id = account.id
                  WHERE blog_post_id = :postId AND comment.is_approved = 1
                  ORDER BY created_at DESC';
        $req = $db->prepare($query);
        $req->bindValue(':postId', $id, PDO::PARAM_INT);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setUsername($row['username']);
            $comment->setContent($row['content']);
            $comment->setCreatedAt($row['created_at']);
            $comment->setIsApproved($row['is_approved']);
            $comment->setBlogPostId($row['blog_post_id']);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function create($values)
    {
        $db = $this->db;
        $accountId = $_SESSION['id'];
        $query = 'INSERT INTO comment(content, created_at, is_approved, blog_post_id, account_id) 
                  VALUES(:content, NOW(), :isApproved, :blogPostId, :accountId)';
        $req = $db->prepare($query);
        $req->bindValue(':content', $values['content'], PDO::PARAM_STR);
        if ($_SESSION['role'] == 'Admin') {
            $req->bindValue(':isApproved', 1, PDO::PARAM_INT);
        } else {
            $req->bindValue(':isApproved', 0, PDO::PARAM_INT);
        }
        $req->bindValue(':blogPostId', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':accountId', $accountId, PDO::PARAM_INT);
        $req->execute();
    }

    public function approve($id)
    {
        $db = $this->db;
        $query = 'UPDATE comment 
                  SET is_approved = 1
                  WHERE id = :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function disapprove($id)
    {
        $db = $this->db;
        $query = 'UPDATE comment 
                  SET is_approved = 0
                  WHERE id = :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
}


