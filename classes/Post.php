<?php

class Post extends Entity
{
    private $id;
    private $title;
    private $heading;
    private $content;
    private $createdAt;
    private $isActive;
    private $lastModification;
    private $accountId;

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param mixed $heading
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
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
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getLastModification()
    {
        return $this->lastModification;
    }

    /**
     * @param mixed $lastModification
     */
    public function setLastModification($lastModification)
    {
        $this->lastModification = $lastModification;
    }

    /**
     * @return mixed
     */
    public function getaccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     */
    public function setaccountId($accountId)
    {
        $this->accountId = $accountId;
    }

}

