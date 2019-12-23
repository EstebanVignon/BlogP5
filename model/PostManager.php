<?php

class PostManager extends ModelManager
{
    public function find($postId)
    {
        $db = $this->db;

        $id = $postId;

        $query = 'SELECT * FROM blog_post WHERE id = :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setHeading($row['heading']);
            $post->setContent($row['content']);
            $post->setCreatedAt($row['created_at']);
            $post->setIsActive($row['is_active']);
            $post->setLastModification($row['last_modification']);
            $post->setaccountId($row['account_id']);
        }

        return $post;
    }

    public function findAll()
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
            $post->setIsActive($row['is_active']);
            $post->setLastModification($row['last_modification']);
            $post->setaccountId($row['account_id']);

            $posts[] = $post;
        }

        return $posts;
    }

    public function findUsersPosts()
    {
        $db = $this->db;

        $query = 'SELECT * 
                  FROM blog_post 
                  WHERE account_id = :accountId
                  ORDER BY created_at 
                  DESC LIMIT 0, 5';
        $req = $db->prepare($query);
        $req->bindValue(':accountId', $_SESSION['id'], PDO::PARAM_INT);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post->setId($row['id']);
            $post->setTitle($row['title']);
            $post->setHeading($row['heading']);
            $post->setContent($row['content']);
            $post->setCreatedAt($row['created_at']);
            $post->setIsActive($row['is_active']);
            $post->setLastModification($row['last_modification']);
            $post->setaccountId($row['account_id']);

            $posts[] = $post;
        }

        return $posts;
    }

    public function findAuthor(int $id)
    {
        $accountId = $id;

        $db = $this->db;
        $query = 'SELECT username
                  FROM blog_post bp INNER JOIN account a
                  ON bp.account_id = a.id
                  WHERE a.id = :accountId';
        $req = $db->prepare($query);
        $req->bindValue(':accountId', $accountId, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($values)
    {
        $db = $this->db;
        $userId = $_SESSION['id'];

        $query = 'INSERT INTO blog_post(title, heading, content, created_at, is_active, account_id) 
                  VALUES(:title, :heading, :content, NOW(), 1, :userId)';

        $req = $db->prepare($query);

        $req->bindValue(':title', $values['title'], PDO::PARAM_STR);
        $req->bindValue(':heading', $values['heading'], PDO::PARAM_STR);
        $req->bindValue(':content', nl2br($values['content']), PDO::PARAM_STR);
        $req->bindValue(':userId', $userId, PDO::PARAM_INT);

        $req->execute();

    }

    public function edit($values)
    {
        $db = $this->db;
        $query = 'UPDATE blog_post 
                  SET title = :title, heading = :heading, content = :content, last_modification = NOW()
                  WHERE id = :id';
        $req = $db->prepare($query);
        $req->bindValue(':title', $values['title'], PDO::PARAM_STR);
        $req->bindValue(':heading', $values['heading'], PDO::PARAM_STR);
        $req->bindValue(':content', nl2br($values['content']), PDO::PARAM_STR);
        $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->execute();
    }

}