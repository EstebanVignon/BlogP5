<?php

class Router
{
    private $request;

    private $routes = [
        "home" => ["controller" => 'Home', "method" => 'showHome'],
        "contact" => ["controller" => 'Home', "method" => 'contact'],
        "login" => ["controller" => 'Login', "method" => 'showLogin'],
        "checkLogin" => ["controller" => 'Login', "method" => 'checkLogin']
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function renderController()
    {
        $request = $this->request;

        if (key_exists($request, $this->routes)) {

            $controller = $this->routes[$request]['controller'];
            $method = $this->routes[$request]['method'];

            $currentController = new $controller();
            $currentController->$method();
        } else {
            include(VIEW . 'error.php');
        }
    }
}
