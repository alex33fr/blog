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

    /* Inscription

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
    */

    public function deletePost()
    {
        $this->checkAuthentication();
        $post = $this->postManager->getPost($_GET['id']);

        if($post){
            $this->postManager->deletePost($post['id']);
            $this->redirect('listPostsAdmin');
        }else{
            throw new \Exception("Ce post n'existe pas");
        }
    }


    public function dashboard()
    {
        $this->checkAuthentication();
        $this->renderView('backend/dashboard');
    }

    public function deleteComment()
    {
        $this->checkAuthentication();

        $id = $_GET['id'];
        $com = $this->commentManager->getComment($id);

        if($com){
            $this->commentManager->deleteComment($com['id']);
            $this->redirect('listComments');
        }else{
            throw new \Exception("Ce commentaire n'existe pas");
        }

    }


    public function listComments(){
        $this->checkAuthentication();
        $this->renderView('backend/listComments', ['listComments' => $this->commentManager->getListReportedComments()]);
    }

    public function editPassword()
    {
        $this->checkAuthentication();

        if(isset($_POST['editPassword'])){

            $user = $_SESSION['user'];
            $ancientPassword = $_POST['ancient_password'];
            $newPassword = $_POST['new_password'];
            $repeatNewPassword = $_POST['repeat_new_password'];


            if ($newPassword == $repeatNewPassword) {
                if(password_verify($ancientPassword, $user['password']))
                {
                    $this->userManager->changePassword($newPassword,$user['id']);
                }
                else{
                    echo "Ancient mot de passe ne correspondent pas !";
                }
            }else{
                echo "Vos mots de passes ne correspondent pas !";
            }
        }
        $this->renderView('backend/editPassword');
    }

    public function validateComment()
    {
        $this->checkAuthentication();

        $id = $_GET['id'];
        $com = $this->commentManager->getComment($id);
        if($com){
            if($this->commentManager->resetCounter($id)){
                $this->commentManager->validateComment($id);
                $this->redirect('listComments', ['id' => $com['post_id'] ]);
            }else{
                throw new \Exception('Impossible d\'Aprouver le commentaire !');
            }
        }else{
            throw new \Exception('Le commentaire inexistant');

        }
    }


    public function listPostsAdmin()
    {
        $this->checkAuthentication();
        $this->renderView('backend/listPostsAdmin', [
            'posts' => $this->postManager->getPosts()
        ]);
    }

    public function editPost()
    {
        $this->checkAuthentication();

        $post = $this->postManager->getPost($_GET['id']);
        if($post){
            if(isset($_POST['title']) && isset($_POST['contents'])) {
                $title = $_POST['title'];
                $contents = $_POST['contents'];

                $this->postManager->editPost($post['id'], $title, $contents);
                $this->redirect('post', ['id' => $post['id']]);
            }else{
                $this->renderView('backend/editPost', ['data' => $post]);

            }
        }else{
            throw new \Exception("Ce post n'existe pas");
        }
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
