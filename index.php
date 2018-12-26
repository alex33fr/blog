<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26/12/2018
 * Time: 07:55
 */
require ('controller/controller.php');
require ('src/DAO/db.php');

?>

<!-- Affichage HTML -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog | Jean Forteroche</title>
    </head>

    <body>
        <h1>La premiere page du blog</h1>
        <p>Affichage des billets</p>
                <?php
                $commentsDAO = $connection->query('SELECT id, post_id, author, comment, comment_date FROM comments');
                $comments = $commentsDAO->fetch();
                echo $comments['id'] . $comments['post_id'] . $comments['author'] . $comments['comment'] . $comments['comment_date'];
                ?>
    </body>
</html>