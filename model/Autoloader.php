<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 07/01/2019
 * Time: 23:17
 */



class Autoloader{
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class_name){
        require 'model/' . $class_name . '.php';
    }
}