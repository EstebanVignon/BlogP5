<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

class CustomAutoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

        //GLOBAL
        $host = $_SERVER['HTTP_HOST'];
        $root = $_SERVER['DOCUMENT_ROOT'];
        define('HOST', 'https://' . $host . '/BlogP5/');
        define('ROOT', $root . '/BlogP5/');

        //FOLDERS
        define('CONTROLLER', ROOT . 'controller/');
        define('VIEW', ROOT . 'view/');
        define('MODEL', ROOT . 'model/');
        define('CLASSES', ROOT . 'classes/');
        define('ASSETS', HOST . 'assets/');

        //DATABASE
        define('DBHOST', 'localhost');
        define('DBNAME', 'ocblog');
        define('DBUSERNAME', 'root');
        define('DBPWD', '');
    }

    public static function autoload($class)
    {
        if (file_exists(MODEL . $class . '.php')) {
            include_once(MODEL . $class . '.php');
        } elseif (file_exists(CLASSES . $class . '.php')) {
            include_once(CLASSES . $class . '.php');
        } elseif (file_exists(CONTROLLER . $class . '.php')) {
            include_once(CONTROLLER . $class . '.php');
        }
    }
}
