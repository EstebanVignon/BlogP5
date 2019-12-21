<?php

class Comment
{
    private $id;
    private $username;
    private $content;
    private $created_at;
    private $is_approved;
    private $blog_post_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getIsApproved()
    {
        return $this->is_approved;
    }

    /**
     * @param mixed $is_approved
     */
    public function setIsApproved($is_approved): void
    {
        $this->is_approved = $is_approved;
    }

    /**
     * @return mixed
     */
    public function getBlogPostId()
    {
        return $this->blog_post_id;
    }

    /**
     * @param mixed $blog_post_id
     */
    public function setBlogPostId($blog_post_id): void
    {
        $this->blog_post_id = $blog_post_id;
    }

}