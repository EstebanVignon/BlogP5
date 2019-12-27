<?php

class Home
{
    public function showHome($params)
    {
        $myView = new View('_home');
        $myView->setPageTitle('Page d\'Accueil Du blog De Esteban Vignon');
        $myView->setPageDesc('Page d\'accueil Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function showBlog($params)
    {
        $manager = new PostManager();
        $posts = $manager->findAll();

        $myView = new View('_blog');
        $myView->setPageTitle('Page de blog De Esteban Vignon');
        $myView->setPageDesc('Liste des Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render(array('posts' => $posts));
    }

    public function showPost($params)
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $postManager = new PostManager();
            $post = $postManager->find($id);
            $author = $postManager->findAuthor($post->getaccountId());

            $commentManager = new CommentManager();
            $comments = $commentManager->findBlogPostComments($id);


            $myView = new View('_post');
            $myView->setPageTitle('Article Du blog De Esteban Vignon');
            $myView->setPageDesc('Page d\'article Du Blog De Esteban Vignon - Développeur PHP');
            $myView->render(array('post' => $post, 'author' => $author, 'comments' => $comments));
        } else {
            $myView = new View('_error');
            $myView->render(array('errorMessage' => 'Pas d\'ID d\'article demandé'));
        }
    }

    public function contact($params)
    {
        $values = $_POST['values'];

        if (
            empty($values['name']) ||
            empty($values['email']) ||
            empty($values['message']) ||
            !filter_var($values['email'], FILTER_VALIDATE_EMAIL)
        ) {
            header('Location: home');
            exit;
        }

        $manager = new MailManager();
        $manager->send($values, 'vignon.esteban@gmail.com', 'Mail Du Site Esteban-Vignon.fr');

        $view = new View();
        $route = 'home';
        $view->redirect($route);

    }

    public function addComment($params)
    {
        $values = $_POST['values'];
        $manager = new CommentManager();
        $manager->create($values);

        $view = new View();
        if ($_SESSION['role'] == 'Admin'){
            $route = 'post?id=' . $values['id'] . '#commentaires';
        }else{
            $route = 'post?message=1&id=' . $values['id'] . '#commentaires';
        }

        $view->redirect($route);
    }

    public function showError($params = null)
    {
        $errorMessage = $params;
        $myView = new View('_error');
        $myView->setPageTitle('Page d\'Accueil Du blog De Esteban Vignon');
        $myView->setPageDesc('Page d\'accueil Du Blog De Esteban Vignon - Développeur PHP');
        if ($params === null){
            $myView->render(array('errorMessage' => 'La page demandée n\'existe pas'));
        } else{
            $myView->render(array('errorMessage' => $errorMessage));
        }

    }

}
