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
    private $userManager;

    /**
     * BackController constructor.
     */
    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function register()
    {

        $this->checkAuthentication();
        $erreurs = [];

        if (isset($_POST['formulary_register'])) {
            $firstName = htmlspecialchars($_POST['first_name']);
            $lastName = htmlspecialchars($_POST['last_name']);
            $email = htmlspecialchars($_POST['email']);
            $emailControl = htmlspecialchars($_POST['email_control']);
            $password = $_POST['password'];
            $passwordControl = $_POST['password_control'];

            if (!empty($_POST['first_name']) AND !empty($_POST['last_name']) AND !empty($_POST['email']) AND !empty($_POST['email_control']) AND !empty($_POST['password']) AND !empty($_POST['password_control'])) {

                if (strlen($firstName > 30)) {
                    $erreurs[] = "Vous ne pouvez pas saisir un prenom de plus de 30 caractères";
                }
                if (strlen($lastName > 30)) {
                    $erreurs[] = "Vous ne pouvez pas saisir un nom de plus de 30 caractères";
                }
                if ($emailControl != $email) {
                    $erreurs[] = "Les emails ne correspondent pas";
                }
                if ($password != $passwordControl) {
                    $erreurs[] = "Vos mots de passes ne correspondent pas !";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erreurs[] = "Votre adresse mail n'est pas valide";
                }
                if (!$this->userManager->checkAvailableEmail($email)) {

                    $erreurs[] = "Cette adresse mail est déjà utilisée ";
                }

                if (count($erreurs) == 0) {
                    $this->userManager->createUser($firstName, $lastName, $email, $password);
                }

            } else {
                $erreurs[] = "Tous les champs doivent être complétés !";
            }
        }
        $this->renderView('backend/register', ['erreurs' => $erreurs]);
    }

    public function deletePost()
    {
        $this->checkAuthentication();
        $post = $this->postManager->getPost($_GET['id']);

        if($post){
            $this->postManager->deletePost($post['id']);
            $this->redirect('post',['id' => $post['post_id']]);
        }else{
            throw new \Exception("Ce post n'existe pas");
        }
    }

    public function dashboard()
    {
        $this->checkAuthentication();

    }

    public function deleteComment()
    {
        $this->checkAuthentication();
        $com = $this->commentManager->getComment($_GET['id']);

        if($com){
            $this->commentManager->deleteComment($com['id']);
            $this->redirect('post',['id' => $com['post_id']]);
        }else{
            throw new \Exception("Ce commentaire n'existe pas");
        }

    }

    public function validateComment()
    {
        $this->checkAuthentication();
        // TODO l'admin supprimer les signalements d'un commentaire
    }

    public function editPost()
    {
        $this->checkAuthentication();
        //TODO l'admin peut editer un article

    }

    public function createPost()
    {
        $this->checkAuthentication();

        if(isset($_POST['title']) && isset($_POST['contents'])){

            $title = $_POST['title'];
            $contents = $_POST['contents'];
            $affectedLines = $this->postManager->addPost($_SESSION['user'],$title,$contents);

            if ($affectedLines === false) {
                throw new \Exception('Impossible d\'ajouter le post !');
            } else {
                $this->redirect('listPosts');
            }


        }

        $this->renderView('backend/createPost');

    }


    private function checkAuthentication()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('login');
        }

    }

}
