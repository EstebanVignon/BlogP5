<?php

class Home
{
    public function showHome($params)
    {
        $myView = new View('home');
        $myView->setPageTitle('Page d\'Accueil Du blog De Esteban Vignon');
        $myView->setPageDesc('Page d\'accueil Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function showError($params)
    {
        $myView = new View('error');
        $myView->setPageTitle('Page d\'Accueil Du blog De Esteban Vignon');
        $myView->setPageDesc('Page d\'accueil Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function showBlog($params)
    {
        $manager = new PostManager();
        $posts = $manager->findAll();

        $myView = new View('blog');
        $myView->setPageTitle('Page de blog De Esteban Vignon');
        $myView->setPageDesc('Liste des Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render(array('posts' => $posts));
    }

    public function addComment($params)
    {
        $values = $_POST['values'];
        $manager = new CommentManager();
        $manager->create($values);

        $view = new View();
        $route = 'post?id=' . $values['id'] . '#commentaires';
        $view->redirect($route);
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


            $myView = new View('post');
            $myView->setPageTitle('Article Du blog De Esteban Vignon');
            $myView->setPageDesc('Page d\'article Du Blog De Esteban Vignon - Développeur PHP');
            $myView->render(array('post' => $post, 'author' => $author, 'comments' => $comments));
        } else {
            $myView = new View('error');
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

    public function showDashboard($params)
    {
        if (!isset($_SESSION['role'])) {
            $view = new View();
            $view->redirect('login');
            exit;
        }

        $posts = null;
        $commentsToApprove = null;

        //Show user's posts
        if ($_SESSION['role'] === 'Admin') {
            $postManager = new PostManager();
            $posts = $postManager->findUsersPosts();
        }

        //Show comment to approve or delete
        if ($_SESSION['role'] === 'Admin') {
            $commentManager = new CommentManager();
            $commentsToApprove = $commentManager->findAll();
        }

        $myView = new View('/dashboard/index');
        $myView->setPageTitle('Page d\'Administration Du blog De Esteban Vignon');
        $myView->render(array('posts' => $posts, 'commentsToApprove' => $commentsToApprove));

    }

    public function addPost($params)
    {
        $values = $_POST['values'];
        $manager = new PostManager();
        $manager->create($values);

        $view = new View();
        $view->redirect('dashboard');
    }

    public function showLogin($params)
    {
        if (isset($_SESSION['role'])) {
            $view = new View();
            $view->redirect('dashboard');
            exit;
        }
        $myView = new View('login');
        $myView->setPageTitle('Login Du blog De Esteban Vignon');
        $myView->setPageDesc('Page de connexion du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function logout($params)
    {
        session_destroy();
        $view = new View();
        $view->redirect('login');
    }

    public function checkLogin($params)
    {
        $values = $_POST['values'];

        if (!empty($values['submit-connexion']) && $values['submit-connexion'] == 1) {
            if (empty($values['password']) && empty($values['username'])) {
                $myView = new View('login');
                $myView->render(array('errorMessage' => 'Nom d\'utilisateur et mot de passe vide'));
            } elseif (empty($values['password'])) {
                $myView = new View('login');
                $myView->render(array('errorMessage' => 'Mot de passe vide'));
            } elseif (empty($values['username'])) {
                $myView = new View('login');
                $myView->render(array('errorMessage' => 'Nom d\'utilisateur vide'));
            } else {
                $manager = new LoginManager();
                $account = $manager->checkCredentials($values);

                if ($account->getUsername() === NULL) {
                    $myView = new View('login');
                    $myView->render(array('errorMessage' => 'Le nom d\'utilisateur n\'existe pas'));
                } elseif (password_verify($values['password'], $account->getPassword())) {

                    $_SESSION['role'] = $account->getRole();
                    $_SESSION['username'] = $account->getUsername();
                    $_SESSION['isApproved'] = $account->getIsApproved();
                    $_SESSION['id'] = $account->getId();

                    $view = new View();
                    $view->redirect('dashboard');
                } else {
                    $myView = new View('login');
                    $myView->render(array('errorMessage' => 'Bonjour ' . $account->getUsername() . ', votre mot de passe est incorrect'));
                }
            }
        } elseif (!empty($values['submit-register']) && $values['submit-register'] == 1) {
            $myView = new View('login');
            $myView->render(array('errorMessage' => 'PAS ENCORE POSSIBLE DE SINSCRIRE'));
        }
    }

    public function deletePost($params)
    {
        $id = $params;
        $manager = new PostManager();
        $post = $manager->find($id);
        $manager->delete($post);


        $view = new View();
        $view->redirect('dashboard');

    }

    public function showEditPost($params)
    {
        $id = $params;
        if (isset($params)) {
            $manager = new PostManager();
            $post = $manager->find($params);
        } else {
            $view = new View();
            $view->redirect('dashboard');
            exit();
        }

        $view = new View('edit-post');
        $view->render(array('post' => $post));
    }

    public function editPost($params)
    {
        $values = $_POST['values'];

        $manager = new PostManager();
        $manager->edit($values);


        $view = new View();
        $view->redirect('dashboard');

    }

    public function deleteComment($params)
    {
        $commentId = $params;
        $manager = new CommentManager();

        $comment = $manager->find($commentId);
        $manager->delete($comment);

        $view = new View();
        $view->redirect('dashboard');

    }

    public function approveComment($params)
    {
        $id = $params;
        $manager = new CommentManager();
        $manager->approve($id);

        $view = new View();
        $view->redirect('dashboard');

    }

    public function disapproveComment($params)
    {
        $id = $params;
        $manager = new CommentManager();
        $manager->disapprove($id);

        $view = new View();
        $view->redirect('dashboard');

    }




}
