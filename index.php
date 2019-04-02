<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01/01/2019
 * Time: 21:17
 */

require 'config/config.php';
require 'Framework/Autoloader.php';
\Blog\Framework\Autoloader::register();

session_start();
$frontController = new \Blog\Controller\FrontController();
$backController = new \Blog\Controller\BackController();

try {

    $action = $_GET['action'] ?? 'listPosts';

    switch ($action) {
        case 'listPosts':
            $frontController->listPosts();
            break;
        case 'listPostsAdmin':
            $backController->listPostsAdmin();
            break;
        case 'post':
            $frontController->post();
            break;
        case 'addComment':
            $frontController->addComment();
            break;
        /*
        Action d'inscription, non utilisée
        case 'register':
            $backController->register();
            break;
        */
        case 'login':
            $frontController->login();
            break;
        case 'editPassword':
            $backController->editPassword();
            break;
        case 'reportComment':
            $frontController->reportComment();
            break;
        case 'logout':
            $frontController->logout();
            break;
        case 'deletePost':
            $backController->deletePost();
            break;
        case 'createPost':
            $backController->createPost();
            break;
        case 'editPost':
            $backController->editPost();
            break;
        case 'listComments':
            $backController->listComments();
            break;
        case 'validateComment':
            $backController->validateComment();
            break;
        case 'dashboard':
            $backController->dashboard();
            break;
        case 'deleteComment':
            $backController->deleteComment();
            break;
        default:
            throw new \Exception("Action invalide");
    }


} catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/error.php');
}




