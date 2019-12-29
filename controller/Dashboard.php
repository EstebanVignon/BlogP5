<?php

class Dashboard extends Controller
{
    public function showDashboard($request)
    {
        if (!isset($this->userRole)) {
            $this->redirect('login');
        }

        if ($this->userRole === 'Admin') {

            $posts = null;
            $commentsToApprove = null;

            $postManager = new PostManager();
            $posts = $postManager->findUsersPosts($this->userId);

            $commentManager = new CommentManager();
            $commentsToApprove = $commentManager->findAll();

            $title = 'Tableau de bord zefzef';
            $description = 'Tableau de bord du site de Esteban Vignon';
            $this->render('dashboard/_index.php', array('posts' => $posts, 'commentsToApprove' => $commentsToApprove), $title, $description);
        }
    }

    public function addPost($request)
    {
        $manager = new PostManager();
        $manager->create($request, $this->userId);
        $this->redirect('dashboard');
    }

    public function deletePost($request)
    {
        $manager = new PostManager();
        $post = $manager->find($request['id']);
        $manager->delete($post);
        $this->redirect('dashboard');
    }

    public function showEditPost($request)
    {
        $postManager = new PostManager();
        $post = $postManager->find($request['id']);

        $accountManager = new AccountManager();
        $accounts = $accountManager->findOtherAdminAccounts($this->userId);

        $this->render(
            'dashboard/_editPost.php',
            array('post' => $post,
                'accounts' => $accounts,
                'userId' => $this->userId,
                'userUsername' => $this->userUsername),
            'Edition de l\'article ' . $post->getTitle(),
            'Contenu : ' . $post->getContent()
        );
    }

    public function editPost($request)
    {
        $manager = new PostManager();
        $manager->edit($request);
        $this->redirect('dashboard');
    }

    public function deleteComment($request)
    {
        $manager = new CommentManager();
        $comment = $manager->find($request['id']);
        $manager->delete($comment);
        $this->redirect('dashboard');

    }

    public function approveComment($request)
    {
        $manager = new CommentManager();
        $manager->approve($request['id']);
        $this->redirect('dashboard');
    }

    public function disapproveComment($request)
    {
        $manager = new CommentManager();
        $manager->disapprove($request['id']);
        $this->redirect('dashboard');
    }
}