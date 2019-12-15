<?php

class Blog
{
    public function showBlog()
    {
        $manager = new PostManager();
        $posts = $manager->getPosts();

        $myView = new View('blog');
        $myView->setPageTitle('Page de blog De Esteban Vignon');
        $myView->setPageDesc('Liste des Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render($posts);
    }
}
