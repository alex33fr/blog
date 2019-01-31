<?php

namespace Blog\Controller;


use Blog\Framework\AbstractController;
use Blog\Model\CommentManager;
use Blog\Model\PostManager;
use Blog\Model\UserManager;


class BackController extends AbstractController
{
    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function deletePost()
    {
        $this->checkAuthentication();
    }

    public function deleteComment(){

    }

    public function editPost()
    {

    }

    private function checkAuthentication()
    {
        if(!isset($_SESSION['user'])){
            $this->redirect('login');
        }

    }

}
