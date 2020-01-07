<?php

class Dashboard extends Controller
{
    public function showDashboard($request)
    {
        $posts = null;
        $comments = null;

        if ($this->sessionManager->get('role') === 'Admin') {

            $postManager = new PostManager();
            $posts = $postManager->findUsersPosts($this->sessionManager->get('id'));

            $commentManager = new CommentManager();
            $comments = $commentManager->findAll();

            $accountManager = new AccountManager();
            $accounts = $accountManager->findAll();

            $this->render(
                'dashboard/_index.php',
                array('posts' => $posts,
                    'comments' => $comments,
                    'accounts' => $accounts),
                'Tableau de bord ',
                'Tableau de bord du site de Esteban Vignon'
            );
        }

        if ($this->sessionManager->get('role') === 'Abonné') {

            $commentManager = new CommentManager();
            $comments = $commentManager->findUserComments($this->sessionManager->get('id'));

            $this->render(
                'dashboard/_index.php',
                array('comments' => $comments),
                'Tableau de bord ',
                'Tableau de bord du site de Esteban Vignon'
            );
        }
    }

    public function addPost($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new PostManager();
            $manager->create($request, $this->sessionManager->get('id'));
            $this->redirect('dashboard');
        }
    }

    public function deletePost($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new PostManager();
            $post = $manager->find($request['id']);
            $manager->delete($post);
            $this->redirect('dashboard');
        }
    }

    public function showEditPost($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $postManager = new PostManager();
            $post = $postManager->find($request['id']);

            $accountManager = new AccountManager();
            $accounts = $accountManager->findOtherAdminAccounts($this->sessionManager->get('id'));

            $this->render(
                'dashboard/_editPost.php',
                array('post' => $post, 'accounts' => $accounts),
                'Edition de l\'article ' . $post->getTitle(),
                'Contenu : ' . $post->getContent()
            );
        }
    }

    public function editPost($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new PostManager();
            $manager->edit($request);
            $this->redirect('dashboard');
        }
    }

    public function deleteComment($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new CommentManager();
            $comment = $manager->find($request['id']);
            $manager->delete($comment);
            $this->redirect('dashboard');
        }
    }

    public function approveComment($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new CommentManager();
            $manager->approve($request['id']);
            $this->redirect('dashboard');
        }
    }

    public function disapproveComment($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new CommentManager();
            $manager->disapprove($request['id']);
            $this->redirect('dashboard');
        }
    }

    public function promoteAccount($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new AccountManager();
            $manager->promote($request['id']);
            $this->redirect('dashboard');
        }
    }

    public function decreaseAccount($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new AccountManager();
            $manager->decrease($request['id']);
            $this->redirect('dashboard');
        }
    }

    public function deleteAccount($request)
    {
        if ($this->sessionManager->get('role') === 'Admin') {
            $manager = new AccountManager();
            $account = $manager->find($request['id']);
            $manager->delete($account);
            $this->redirect('dashboard');
        }
    }
}


