<?php

class Router
{
    private $request;

    private $routes = [
        "home" => ["controller" => 'Home', "method" => 'showHome'],
        "blog" => ["controller" => 'Home', "method" => 'showBlog'],
        "post" => ["controller" => 'Home', "method" => 'showPost'],
        "contact" => ["controller" => 'Home', "method" => 'contact'],
        "addComment" => ["controller" => 'Home', "method" => 'addComment'],

        "login" => ["controller" => 'Login', "method" => 'showLogin'],
        "checkLogin" => ["controller" => 'Login', "method" => 'checkLogin'],
        "logout" => ["controller" => 'Login', "method" => 'logout'],

        "dashboard" => ["controller" => 'Dashboard', "method" => 'showDashboard'],
        "addPost" => ["controller" => 'Dashboard', "method" => 'addPost'],
        "del-post" => ["controller" => 'Dashboard', "method" => 'deletePost'],
        "edit-post" => ["controller" => 'Dashboard', "method" => 'showEditPost'],
        "edit-post-send" => ["controller" => 'Dashboard', "method" => 'editPost'],
        "approve-comment" => ["controller" => 'Dashboard', "method" => 'approveComment'],
        "delete-comment" => ["controller" => 'Dashboard', "method" => 'deleteComment'],
        "disapprove-comment" => ["controller" => 'Dashboard', "method" => 'disapproveComment']
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRoute()
    {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams()
    {
        $elements = explode('/', $this->request);
        if (isset($elements[1])) {
            return $elements[1];
        }
        return null;

    }

    public function renderController()
    {
        $route = $this->getRoute();
        $params = $this->getParams();

        if (key_exists($route, $this->routes)) {

            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);
        } else {
            $controller = new Home();
            $controller->showError();
        }
    }
}
