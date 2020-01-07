<?php

class MyAutoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class)
    {
        if (file_exists(MODEL . $class . '.php')) {
            include_once MODEL . $class . '.php';
        } elseif (file_exists(CLASSES . $class . '.php')) {
            include_once CLASSES . $class . '.php';
        } elseif (file_exists(CONTROLLER . $class . '.php')) {
            include_once CONTROLLER . $class . '.php';
        }
    }
}


