<?php


class CommentManager
{
    private $db;

    public function __construct()
    {
        $this->db = $db = new PDO('mysql:host=localhost;dbname=ocblog;charset=utf8', 'root', '');
    }

    public function getComments($postId)
    {
        $id = $postId;
        $comments = [];

        $db = $this->db;
        $query = 'SELECT * 
                FROM comment
                WHERE blog_post_id = :postId
                ORDER BY created_at DESC';
        $req = $db->prepare($query);
        $req->bindValue(':postId', $id, PDO::PARAM_INT);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Comment();
            $comment->setId($row['id']);
            $comment->setFirstname($row['firstname']);
            $comment->setLastname($row['lastname']);
            $comment->setContent($row['content']);
            $comment->setEmail($row['email']);
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

        $query = 'INSERT INTO comment(firstname, lastname, content, email, created_at, is_approved, blog_post_id) 
                  VALUES(:firstname, :lastname, :content, :email, NOW(), 0, :blogPostId)';

        $req = $db->prepare($query);

        $req->bindValue(':firstname', $values['firstname'], PDO::PARAM_STR);
        $req->bindValue(':lastname', $values['lastname'], PDO::PARAM_STR);
        $req->bindValue(':content', $values['content'], PDO::PARAM_STR);
        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);
        $req->bindValue(':blogPostId', $values['id'], PDO::PARAM_INT);

        $req->execute();

    }


}


