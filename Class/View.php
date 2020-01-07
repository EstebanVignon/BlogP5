<?php

namespace App;

class View
{
    private $sessionManager;
    private $pageTitle;
    private $pageDesc;

    public function render($templateName, $params = [])
    {
        extract($params);
        $sessionManager = $this->sessionManager;

        $accountRole = $sessionManager->get('role');
        $accountId = $sessionManager->get('id');
        $accountUsername = $sessionManager->get('username');
        $accountApproved = $sessionManager->get('is_approved');

        ob_start();
        include VIEW . $templateName;
        $contentPage = ob_get_clean();

        !empty($this->pageTitle) ? $pageTitle = $this->pageTitle : $pageTitle = 'Blog de Esteban Vignon';
        !empty($this->pageDesc) ? $pageDesc = $this->pageDesc : $pageDesc = 'Blog de Esteban Vignon - Développeur PHP - Symphony';

        include_once VIEW . 'template.php';
    }

    public function redirect($route)
    {
        header("Location: " . HOST . $route);
    }

    public function setSessionManager($session)
    {
        $this->sessionManager = $session;
    }

    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    public function setPageDesc($pageDesc)
    {
        $this->pageDesc = $pageDesc;
    }

}


