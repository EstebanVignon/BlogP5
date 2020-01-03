<?php

Class Router
{
    private $request;
    private $routeName;
    private $routes;

    public function __construct($url)
    {
        $routes = new Routes();
        $this->routes = $routes->getRoutes();

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

        $count = count($elements);

        for ($i = 1; $i < $count; $i++) {

            if (empty($elements[$i + 1])) {
                $controller = new Home();
                $controller->showError(array('message' => 'Erreur Paramètres URL'));
            } else {
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
            $currentController->$method($params); //return params array
        } else {
            $controller = new Home();
            $controller->showError(array());
        }
    }


}
