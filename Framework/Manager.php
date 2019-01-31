<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/01/2019
 * Time: 01:14
 */

namespace Blog\Framework;

abstract class Manager{

    public function dbConnect()
    {
        $db = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);
        if(DEV_ENVIRONNEMENT){
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}