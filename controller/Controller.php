<?php

namespace Controller;

use App\Core\SessionManager;
use App\Core\View;

abstract class Controller
{
    protected $view;
    protected $sessionManager;

    public function __construct()
    {
        $sessionManager = new SessionManager();

        $view = new View();
        $view->setSessionManager($sessionManager);
        $this->sessionManager = $sessionManager;
        $this->view = $view;
    }

    public function render($templateName, array $params = [], $pageTitle = null, $pageDesc = null)
    {
        $this->view->setPageTitle($pageTitle);
        $this->view->setPageDesc($pageDesc);
        $this->view->render($templateName, $params);
    }

    public function redirect($route)
    {
        $this->view->redirect($route);
    }

    public function checkRole(){
        if ($this->sessionManager->get('role') === "Admin"){
            return 1;
        }
        if ($this->sessionManager->get('role') === "Abonné"){
            return 2;
        }
        return null;
    }
}


