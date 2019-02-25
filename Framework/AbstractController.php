<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 09/01/2019
 * Time: 16:57
 */

namespace Blog\Framework;


abstract class AbstractController
{

    /**
     * @param string $path  File path without .php
     * @param array $data
     */
    protected function renderView(string $path, array $data = [])
    {
        extract($data);
        require(__DIR__ . '/../view/' . $path . '.php');
    }


    /**
     * @param string $action parametre d'action (voir dans index.php)
     * @param array $parameters liste des parametres d'url supplementaires
     *
     *   ex : redirect('accueil', ['id'=> 12, 'name' => 'toto]) => redirigera vers index.php?action=accueil&id=12&name=toto
     */
    protected function redirect(string $action,array $parameters = [])
    {
        $url = "Location: index.php?action=$action";

        foreach ($parameters as $key => $value){
            $url .= "&$key=$value";
        }

        header($url);
        die();
    }
}
