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

    public function showPost()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $manager = new PostManager();
            $post = $manager->find($id);

            $author = $manager->findAuthor($post->getaccountId());

            $myView = new View('post');
            $myView->setPageTitle('Article Du blog De Esteban Vignon');
            $myView->setPageDesc('Page d\'article Du Blog De Esteban Vignon - Développeur PHP');
            $myView->render(array('post' => $post, 'author' => $author));
        }else{
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
        $header .= "Reply-To: $email";

        mail($to, $subject, $body, $header);

        header('Location: home');
    }
}
