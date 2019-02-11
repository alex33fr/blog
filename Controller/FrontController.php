<?php

namespace Blog\Controller;


use Blog\Framework\AbstractController;
use Blog\Model\CommentManager;
use Blog\Model\PostManager;
use Blog\Model\UserManager;


class FrontController extends AbstractController
{
    private $postManager;
    private $commentManager;

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

    public function register()
    {
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
        $this->renderView('frontend/register', ['erreurs' => $erreurs]);
    }


    public function reportComment()
    {
// TODO un utilisateur peut signaler un commentaire
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
                            $_SESSION['user'] = $user['first_name'];

                            $this->redirect('listPosts');
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
}
