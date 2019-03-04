<?php

namespace Blog\Controller;


use Blog\Framework\AbstractController;
use Blog\Model\CommentManager;
use Blog\Model\PostManager;
use Blog\Model\UserManager;


class FrontController extends AbstractController
{
    /** @var PostManager */
    private $postManager;
    /** @var CommentManager */
    private $commentManager;
    /** @var UserManager */
    private $userManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function listPosts()
    {
        $this->renderView('frontend/listPosts', [
            'posts' => $this->postManager->getPosts()
        ]);
    }

    public function post()
    {
        $this->renderView('frontend/post', [
            'post' => $this->postManager->getPost($_GET['id']),
            'comments' => $this->commentManager->getComments($_GET['id'])

        ]);
    }

    /**
     * @throws \Exception
     */
    public function addComment()
    {
        $author = $_POST['author'];
        $comment = $_POST['comment'];
        $postId = $_GET['id'];

        //REGLES de validations
        if (empty($author)) {
            throw new \Exception("Parametre Author manquant");
        }
        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            $this->redirect('post', ['id' => $postId]);
        }
    }


    public function reportComment()
    {
        $id = $_GET['id'];
        $com = $this->commentManager->getComment($id);
        if($com){
            if($this->commentManager->alertCounter($id)){
                $this->redirect('post', ['id' => $com['post_id'] ]);
            }else{
                throw new \Exception('Impossible de signaler le commentaire !');
            }
        }else{
            throw new \Exception('Commentaire inexistant');

        }
    }


    public function login()
    {

        $erreurs = [];

        if (isset($_POST['login'])) {
            $email = ($_POST['email']);
            $password = $_POST['password'];

            if (isset($_POST['email']) AND !empty($_POST['password'])) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erreurs[] = "Votre adresse mail n'est pas valide";
                }
                if (count($erreurs) == 0) {
                    $user = $this->userManager->getUser($email);
                    if ($user) {
                        if (password_verify($password, $user['password'])) {
                            $_SESSION['user'] = $user;

                            $this->redirect('dashboard');
                        }
                    }
                } else {
                    $erreurs[] = "Compte inexistant";
                }
            }
        } else {
            $erreurs[] = "Tous les champs doivent être complétés !";
        }
        $this->renderView('frontend/login', ['erreurs' => $erreurs]);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $this->redirect('listPosts');
    }
}
