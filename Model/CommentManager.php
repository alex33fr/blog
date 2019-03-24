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
        $comments = $db->prepare('SELECT id, author, comment, validate_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    public function getListReportedComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT a.title, b.post_id, b.id, b.author, b.comment, b.alert_counter, DATE_FORMAT(b.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments AS b INNER JOIN tickets AS a ON a.id = b.post_id  ORDER BY b.alert_counter DESC, b.id DESC');
        return $req;
    }

    /**
     * @param int $postId
     * @param string $author
     * @param string $comment
     *
     * @return bool  true if success
     */
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = :id');

        return $req->execute(['id' => $id]);

    }

    /**
     * Cette méthode nous retourne null ou un tableau représentant un commentaire
     * @param int $id
     * @return array|null
     */
    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, post_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function alertCounter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET alert_counter = alert_counter + 1 WHERE id = :id');

        return $req->execute(['id' => $id]);
    }

    public function validateComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET validate_comment = 1 WHERE id = :id');

        return $req->execute(['id' => $id]);
    }

    public function resetCounter($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET alert_counter = 0 WHERE id = :id');

        return $req->execute(['id' => $id]);
    }

}