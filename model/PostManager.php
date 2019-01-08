<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/01/2019
 * Time: 00:56
 */

namespace Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts(){

        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, contents, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM tickets ORDER BY date_create DESC LIMIT 0, 10');
        return $req;
    }

    public function getPost($postId){

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, contents, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM tickets WHERE id = ? ');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}