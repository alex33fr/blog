<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22/01/2019
 * Time: 13:39
 */

namespace Blog\Model;

use Blog\Framework\Manager;

class UserManager extends Manager
{

    public function checkAvailableEmail($email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id FROM user WHERE email = :email');
        $req->execute(['email' => $email]);

        return ($req->fetch()) ? false : true;
    }

    public function createUser($firstname, $lastname, $email, $plainPassword)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO user(first_name, last_name, email, password) VALUES(?, ?, ?, ?)');
        $affectedLines = $req->execute(array($firstname, $lastname, $email, password_hash($plainPassword,PASSWORD_BCRYPT)));

        return $affectedLines;
    }

    public function getUser($email){

        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM user WHERE email =:email");
        $req->execute(['email'=>$email]);
        return $req->fetch();
    }
}