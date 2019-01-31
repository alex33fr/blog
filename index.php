<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01/01/2019
 * Time: 21:17
 */

require 'config/config.php';
require 'Framework\Autoloader.php';
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
        case 'post':
            $frontController->post();
            break;
        case 'addComment':
            $frontController->addComment();
            break;
        case 'register':
            $frontController->register();
            break;
        case 'login':
            $frontController->login();
            break;
        case 'deletePost':
            $backController->deletePost();
            break;
        default:
            throw new \Exception("Action invalide");
    }


} catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/error.php');
}




