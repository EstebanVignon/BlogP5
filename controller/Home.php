<?php

class Home
{
    public function showHome()
    {
        $myView = new View('home');
        $myView->setPageTitle('Page d\'Accueil Du blog De Esteban Vignon');
        $myView->setPageDesc('Page d\'accueil Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function showBlog()
    {
        $manager = new PostManager();
        $posts = $manager->getPosts();

        $myView = new View('blog');
        $myView->setPageTitle('Page de blog De Esteban Vignon');
        $myView->setPageDesc('Liste des Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render(array('posts' => $posts));
    }

    public function addComment()
    {
        $values = $_POST['values'];
        $manager = new CommentManager();
        $manager->create($values);

        $view = new View();
        $route = 'post?id=' . $values['id'] . '#commentaires' ;
        $view->redirect($route);
    }

    public function showPost()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $postManager = new PostManager();
            $post = $postManager->find($id);
            $author = $postManager->findAuthor($post->getaccountId());

            $commentManager = new CommentManager();
            $comments = $commentManager->getComments($id);


            $myView = new View('post');
            $myView->setPageTitle('Article Du blog De Esteban Vignon');
            $myView->setPageDesc('Page d\'article Du Blog De Esteban Vignon - Développeur PHP');
            $myView->render(array('post' => $post, 'author' => $author, 'comments' => $comments));
        } else {
            $myView = new View('error');
            $myView->render(array('errorMessage' => 'Pas d\'ID d\'article demandé'));
        }
    }

    public function contact()
    {
        if (
            empty($_POST['name']) ||
            empty($_POST['email']) ||
            empty($_POST['message']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            header('Location: home');
        }

        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $message = strip_tags(htmlspecialchars($_POST['message']));

        $to = "vignon.esteban@gmail.com";
        $subject = "Formulaire de contact Site CV :  $name";
        $body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
        $header = "From: vignon.esteban@gmail.com";
        $header = "Reply-To: $email";

        mail($to, $subject, $body, $header);

        header('Location: home');
    }
}
