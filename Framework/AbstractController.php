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
    protected function renderView(string $path, array $data = [])
    {
        extract($data);
        require(__DIR__ . '/../view/' . $path . '.php');
    }

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
