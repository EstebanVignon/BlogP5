<?php

require_once(MODEL . 'PostManager.php');
$postManager = new OC\Blog\Model\PostManager();
$posts = $postManager->getPosts();
require_once(VIEW . 'blog.php');


class Blog
{
    public function showBlog()
    {
        $myView = new View('blog');
        $myView->setPageTitle('Page de blog De Esteban Vignon');
        $myView->setPageDesc('Liste des Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }
}
