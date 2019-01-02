<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01/01/2019
 * Time: 21:37
 */

function getPosts(){

    $db = dbConnect();

    $req = $db->query('SELECT id, title, contents, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM tickets ORDER BY date_create DESC LIMIT 0, 10');

    return $req;
}

function getPost($postId){

    $db = dbConnect();

    $req = $db->prepare('SELECT id, title, contents, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM tickets WHERE id = ? ');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function postComment($postId, $author, $comment){

    $db = dbConnect();

    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}

function getComments($postId){

    $db = dbConnect();

    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

function dbConnect(){
        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
}