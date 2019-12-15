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


    public function postComment($firstname, $lastname, $content, $email, $blog_post_id)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO comment(firstname, lastname, content, email, created_at, is_approved, blog_post_id) 
                                 VALUES(?, ?, ?, ?, NOW(), ?, ?)');
        $affectedLines = $comment->execute(array($firstname, $lastname, $content, $email, 0, $blog_post_id));
        return $affectedLines;
    }
}


