<?php

class Controller
{
    protected $view;
    protected $sessionManager;
    protected $userId;
    protected $userRole;
    protected $userUsername;

    public function __construct()
    {
        $sessionManager = new SessionManager();

        $view = new View();
        $view->setSessionManager($sessionManager);
        $this->sessionManager = $sessionManager;
        $this->view = $view;

        $this->userId = $this->sessionManager->get('id');
        $this->userRole = $this->sessionManager->get('role');
        $this->userUsername = $this->sessionManager->get('username');

    }

    public function render($templateName, array $params, $pageTitle = null, $pageDesc = null)
    {
        $this->view->setPageTitle($pageTitle);
        $this->view->setPageDesc($pageDesc);
        $this->view->render($templateName, $params);
    }

    public function redirect($route){
        $this->view->redirect($route);
    }


}
