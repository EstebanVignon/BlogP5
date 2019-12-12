<?php

class Router
{

    private $action;
    private $params;
    private $routes = [
        'blog' => ['controller' => 'FrontendController', 'method' => 'blog'],
        'post' => ['controller' => 'FrontendController', 'method' => 'post'],
        'contact' => ['controller' => 'FrontendController', 'method' => 'contact']
    ];

    public function __construct($action)
    {
        $this->action = $action;
        $this->params = $this->extractParams();
    }

    public function extractParams()
    {
        $params = [];

        foreach ($_POST as $name => $value) {
            $params[$name] = $value;
        }
        foreach ($_GET as $name => $value) {
            $params[$name] = $value;
        }
        return $params;
    }

    public function renderController()
    {
        $action = $this->action;

        if (key_exists($action, $this->routes)) {
            $controller = $this->routes[$action]['controller'];
            $method = $this->routes[$action]['method'];

            $currentController = new $controller();
            $currentController->$method($this->params);
        }
    }
}
