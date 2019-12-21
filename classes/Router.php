<?php

class Router
{
    private $request;

    private $routes = [
        "home" => ["controller" => 'Home', "method" => 'showHome'],
        "contact" => ["controller" => 'Home', "method" => 'contact'],
        "blog" => ["controller" => 'Home', "method" => 'showBlog'],
        "post" => ["controller" => 'Home', "method" => 'showPost'],
        "login" => ["controller" => 'Home', "method" => 'showLogin'],
        "addComment" => ["controller" => 'Home', "method" => 'addComment'],
        "dashboard" => ["controller" => 'Home', "method" => 'showDashboard'],
        "addPost" => ["controller" => 'Home', "method" => 'addPost'],
        "checkLogin" => ["controller" => 'Home', "method" => 'checkLogin'],
        "logout" => ["controller" => 'Home', "method" => 'logout'],
        "del-post" => ["controller" => 'Home', "method" => 'deletePost'],
        "edit-post" => ["controller" => 'Home', "method" => 'showEditPost'],
        "edit-post-send" => ["controller" => 'Home', "method" => 'editPost'],
        "approve-comment" => ["controller" => 'Home', "method" => 'approveComment'],
        "delete-comment" => ["controller" => 'Home', "method" => 'deleteComment'],
        "disapprove-comment" => ["controller" => 'Home', "method" => 'disapproveComment'],
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
