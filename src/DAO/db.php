<?php

//Tentative de connexion à la base de données
try {
    $connection = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root','');
}
    //Remontée d'alarme en cas d'échec de connection
catch(\Exception $errorConnection)
{
    die ('Erreur de connection :'.$errorConnection->getMessage());
}


