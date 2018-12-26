<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/12/2018
 * Time: 09:56
 */


require('../src/model/model.php');

function listPosts()
{
    $posts = getPosts();

    require('../view/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('../view/postView.php');
}
?>