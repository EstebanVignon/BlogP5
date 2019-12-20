<?php

class Home //Extends Controller / Dans nouvel Object Controller : Mettre Vue + Session / Vérifier Session dans le __construct
{
    public function showHome()
    {
        $myView = new View('home');
        $myView->setPageTitle('Page d\'Accueil Du blog De Esteban Vignon');
        $myView->setPageDesc('Page d\'accueil Du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function showError()
    {
        $myView = new View('error');
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
        $route = 'post?id=' . $values['id'] . '#commentaires';
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

    public function showDashboard()
    {
        if ($_SESSION['role'] !== 'Admin') {
            $view = new View();
            $view->redirect('login');
            exit;
        }
        $myView = new View('dashboard');
        $myView->setPageTitle('Page d\'Administration Du blog De Esteban Vignon');
        $myView->render();
    }

    public function showAddPost()
    {
        $myView = new View('addPost');
        $myView->setPageTitle('Ajouter un article pour le blog De Esteban Vignon');
        $myView->render();
    }

    public function addPost()
    {
        $values = $_POST['values'];
        $manager = new PostManager();
        $manager->create($values);

        $view = new View();
        $route = 'addPost';
        $view->redirect($route);
    }

    public function showLogin()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $view = new View();
            $view->redirect('dashboard');
        }
        $myView = new View('login');
        $myView->setPageTitle('Login Du blog De Esteban Vignon');
        $myView->setPageDesc('Page de connexion du Blog De Esteban Vignon - Développeur PHP');
        $myView->render();
    }

    public function logout(){
        session_destroy();
        $view = new View();
        $view->redirect('login');
    }

    public function checkLogin()
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
                    $_SESSION['connected'] = 1;
                    $_SESSION['role'] = $account->getRole();
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


}
