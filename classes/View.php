<?php

class View
{
    private $template;
    private $pageTitle;
    private $pageDesc;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    public function setPageDesc($pageDesc)
    {
        $this->pageDesc = $pageDesc;
    }

    public function render($params = array())
    {
        extract($params);

        $template = $this->template;

        ob_start();
        include_once(VIEW . $template . '.php');
        $contentPage = ob_get_clean();

        !empty($this->pageTitle) ? $pageTitle = $this->pageTitle : $pageTitle = 'Blog de Esteban Vignon';
        !empty($this->pageDesc) ? $pageDesc = $this->pageDesc : $pageDesc = 'Blog de Esteban Vignon - Développeur PHP - Symphony';

        include_once(VIEW . 'template.php');
    }
}
