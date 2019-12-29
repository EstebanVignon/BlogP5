<?php

class Request
{
    private $routeName;
    private $params;

    public function setRouteName($name)
    {
        $this->routeName = $name;
    }

    public function getRouteName()
    {
        return $this->routeName();
    }

    public function addParams($params = array())
    {
        $this->params = $params;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function get($name)
    {
        return $this->params[$name];
    }


}