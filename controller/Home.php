<?php

class Home extends Controller
{
    public function showHome($request)
    {
        $message = isset($request['message']) ? $request['message'] : '';
        $title = 'Page d\'Accueil Du blog De Esteban Vignon';
        $description = 'Page d\'accueil Du Blog De Esteban Vignon - Développeur PHP';
        $this->render('_home.php', array('message' => $message), $title, $description);
    }

    public function showBlog($request)
    {
        $manager = new PostManager();
        $posts = $manager->findAll();

        $title = 'Page de blog De Esteban Vignon';
        $description = 'Liste des Du Blog De Esteban Vignon - Développeur PHP';
        $this->render('_blog.php', array('posts' => $posts), $title, $description);
    }

    public function showPost($request)
    {
        if (isset($request['id'])) {
            $id = $request['id'];

            $postManager = new PostManager();
            $post = $postManager->find($id);
            if ($post === null) {
                $this->redirect('error/message/L\'article demandé n\'existe pas');
            } else {
                $message = isset($request['message']) ? $request['message'] : '';
                $author = $postManager->findAuthor($post->getaccountId());

                $commentManager = new CommentManager();
                $comments = $commentManager->findBlogPostComments($id);

                $this->render(
                    '_post.php',
                    array('post' => $post,
                        'author' => $author,
                        'comments' => $comments,
                        'message' => $message,
                        'userRole' => $this->userRole,
                        ),
                    'Article Du blog De Esteban Vignon',
                    'Page d\'article Du Blog De Esteban Vignon - Développeur PHP');
            }
        }
    }

    public function showError($request)
    {
        if (!isset($request['message'])|| $request['message'] == null) {
            $this->render('_error.php', array('message' => 'Page demandée innexistante'), 'Erreur : La page demandée n\'existe pas');
        } else {
            $this->render('_error.php', array('message' => $request['message']), 'Erreur : ' . $request['message']);
        }
    }

    public function contact($request)
    {
        if (
            empty($request['name']) ||
            empty($request['email']) ||
            empty($request['message']) ||
            !filter_var($request['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $this->redirect('home/message/error');
        }

        $manager = new MailManager();
        $manager->send($request, 'vignon.esteban@gmail.com', 'Mail Du Site Esteban-Vignon.fr');

        $view = new View();
        $route = 'home';
        $this->redirect('home/message/succes');
    }

    public function addComment($request)
    {
        $manager = new CommentManager();
        $manager->create($request);

        if ($this->userRole == 'Admin'){
            $this->redirect('post/id/' . $request['id']);
        }else{
            $this->redirect('post/id/' . $request['id'] . '/message/1');
        }
    }

}
