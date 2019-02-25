<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/01/2019
 * Time: 00:56
 */

namespace Blog\Model;

use Blog\Framework\Manager;

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function deleteComment($id){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = :id');

        return $req->execute(['id' => $id]);

    }
    public function getComment($id)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, author,post_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = :id');
        $comment->execute(array('id' => $id));
        return $comment->fetch();
    }
}