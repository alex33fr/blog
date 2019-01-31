<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 07/01/2019
 * Time: 23:17
 */

namespace Blog\Framework;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class_name)
    {

        $class_path = str_replace('Blog\\', '', $class_name);
        $class_path = str_replace('\\', '/', $class_path);

        require $class_path . '.php';
    }
}