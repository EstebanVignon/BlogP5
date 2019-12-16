<?php

class Router
{
    private $request;

    private $routes = [
        "home" => ["controller" => 'Home', "method" => 'showHome'],
        "contact" => ["controller" => 'Home', "method" => 'contact'],
        "blog" => ["controller" => 'Home', "method" => 'showBlog'],
        "post" => ["controller" => 'Home', "method" => 'showPost'],
        "login" => ["controller" => 'Login', "method" => 'showLogin'],
        "addComment" => ["controller" => 'Home', "method" => 'addComment']
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
            $myView = new View('error');
            $myView->setPageTitle('Erreur');
            $myView->setPageDesc('La page n\'existe pas');
            $myView->render();
        }
    }
}
