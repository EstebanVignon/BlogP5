<?php

Class Router
{
    private $request;
    private $routeName;
    private $routes = [
        "" => ["controller" => 'Home', "method" => 'rootShowHome'],
        "home" => ["controller" => 'Home', "method" => 'showHome'],
        "blog" => ["controller" => 'Home', "method" => 'showBlog'],
        "post" => ["controller" => 'Home', "method" => 'showPost'],
        "error" => ["controller" => 'Home', "method" => 'showError'],
        "contact" => ["controller" => 'Home', "method" => 'contact'],
        "addComment" => ["controller" => 'Home', "method" => 'addComment'],
        "login" => ["controller" => 'Login', "method" => 'showLogin'],
        "checkLogin" => ["controller" => 'Login', "method" => 'checkLogin'],
        "logout" => ["controller" => 'Login', "method" => 'logout'],
        "dashboard" => ["controller" => 'Dashboard', "method" => 'showDashboard'],
        "addPost" => ["controller" => 'Dashboard', "method" => 'addPost'],
        "delete-post" => ["controller" => 'Dashboard', "method" => 'deletePost'],
        "edit-post" => ["controller" => 'Dashboard', "method" => 'showEditPost'],
        "edit-post-send" => ["controller" => 'Dashboard', "method" => 'editPost'],
        "approve-comment" => ["controller" => 'Dashboard', "method" => 'approveComment'],
        "delete-comment" => ["controller" => 'Dashboard', "method" => 'deleteComment'],
        "disapprove-comment" => ["controller" => 'Dashboard', "method" => 'disapproveComment'],
        "promote-account" => ["controller" => 'Dashboard', "method" => 'promoteAccount'],
        "decrease-account" => ["controller" => 'Dashboard', "method" => 'decreaseAccount'],
        "delete-account" => ["controller" => 'Dashboard', "method" => 'deleteAccount']
    ];

    public function __construct($url)
    {
        $request = new Request();
        $request->addParams($this->getParams($url));
        $request->setRouteName($this->routeName);
        $this->request = $request;
    }

    public function getParams($url)
    {
        $params = [];

        $elements = explode('/', $url);
        $this->routeName = $elements[0];

        for ($i = 1; $i < count($elements); $i++) {

            if (empty($elements[$i + 1])){
                $controller = new Home();
                $controller->showError(array('message' => 'Erreur Paramètres URL'));
            }else{
                $params[$elements[$i]] = htmlspecialchars($elements[$i + 1]);
                $i++;
            }
        }

        foreach ($_POST as $key => $value) {
            $params[$key] = htmlspecialchars($value);
        }

        return $params;
    }

    public function renderController()
    {
        $route = $this->routeName;
        $params = $this->request->getParams();
        if (key_exists($route, $this->routes)) {
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];
            $currentController = new $controller();
            $currentController->$method($params);
        } else {
            $controller = new Home();
            $controller->showError(array());
        }
    }


}