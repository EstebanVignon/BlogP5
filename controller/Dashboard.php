<?php

class Dashboard extends Controller
{
    public function showDashboard($request)
    {
        $userRole = $this->sessionManager->get('role');
        $userId = $this->sessionManager->get('id');

        var_dump($userId);
        var_dump($userRole);

        if (!isset($userRole)) {
            $this->redirect('login');
        }

        if ($userRole === 'Admin') {

            //Init
            $posts = null;
            $commentsToApprove = null;

            //Show user's posts
            $postManager = new PostManager();
            $posts = $postManager->findUsersPosts($userId);

            //Render
            $title = 'Tableau de bord';
            $description = 'Tableau de bord du site de Esteban Vignon';
            $this->render('dashboard/_index.php', array('posts' => $posts), $title, $description);




        }

    }

    public function delete($request)
    {
        $manager = new PostManager();
        $article = $manager->find($request->get('id'));
        $this->render('montemplate.php');
    }


    /*
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

        $myView = new View('/dashboard/_index');
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
        $currentUserId = $_SESSION['id'];

        if (isset($params)) {
            $postManager = new PostManager();
            $post = $postManager->find($params);

            $accountManager = new AccountManager();
            $accounts = $accountManager->findOtherAdminAccounts($currentUserId);
        } else {
            $view = new View();
            $view->redirect('dashboard');
            exit();
        }

        $view = new View('dashboard/_editPost');
        $view->render(array('post' => $post, 'accounts' => $accounts));
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
*/
}