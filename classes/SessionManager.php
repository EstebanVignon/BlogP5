<?php

class SessionManager
{
    private $params;

    public function __construct()
    {
        foreach ($_SESSION as $key => $value) {
            $params[$key] = $value;
        }

        $this->params = $params;
    }

    public function initSession($user)
    {
        $this->setUserId($user->getId());
        $this->setRole($user->getRole());
    }

    public function setUserId($id)
    {
        $_SESSION['id'] = $id;
    }

    public function setRole($role)
    {
        $_SESSION['role'] = $role;
    }

    public function get($name)
    {
        return $this->params[$name];
    }
}