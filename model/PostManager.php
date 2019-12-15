<?php

class PostManager
{
    private $db;

    public function __construct()
    {
        $this->db = $db = new PDO('mysql:host=localhost;dbname=ocblog;charset=utf8', 'root', '');
    }

    public function getPosts()
    {
        $db = $this->db;

        $query = 'SELECT * FROM blog_post ORDER BY created_at DESC LIMIT 0, 5';
        $req = $db->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setHeading($row['heading']);
            $post->setContent($row['content']);
            $post->setCreatedAt($row['created_at']);
            $post->setPublicationAt($row['publication_at']);
            $post->setIsActive($row['is_active']);
            $post->setLastModification($row['last_modification']);
            $post->setaccountId($row['account_id']);

            $posts[] = $post;
        }

        return $posts;
    }
}