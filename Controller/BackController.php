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

    /**
     * BackController constructor.
     */
    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function deletePost()
    {
        $this->checkAuthentication();
        // TODO supprimer un article
    }

    public function dashboard(){
        // TODO tableau de bord de l'administrateur
    }

    public function deleteComment(){

    }

    public function validateComment(){
        // TODO l'admin supprimer les signalements d'un commentaire
    }

    public function editPost()
    {
        
        //TODO l'admin peut editer un article

    }

    public function createPost(){
        //TODO l'admin peut ajouter un article
    }


    private function checkAuthentication()
    {
        if(!isset($_SESSION['user'])){
            $this->redirect('login');
        }

    }

}
