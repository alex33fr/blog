<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/01/2019
 * Time: 00:56
 */

namespace Blog\Model;

use Blog\Framework\Manager;

class PostManager extends Manager
{
    public function addPost($author,$title,$contents){

        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO tickets (author,title,contents,date_create) VALUES(?,?,?, NOW())');
        $affectedLines = $post->execute(array($author, $title, $contents));
        return $affectedLines;
    }

    public function getPosts(){

        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, contents, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM tickets ORDER BY date_create DESC LIMIT 0, 10');
        return $req;
    }

    public function editPost($id,$title,$contents){

        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE tickets SET title = :title, contents = :contents WHERE id = :id');
        $affectedLines = $post->execute(array(
            'title' => $title,
            'contents' => $contents,
            'id' => $id));
        return $affectedLines;
    }

    public function deletePost($id){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM tickets WHERE id = :id');

        return $req->execute(['id' => $id]);
    }

    public function getPost($postId){

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, contents, DATE_FORMAT(date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_create_fr FROM tickets WHERE id = ? ');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }


}