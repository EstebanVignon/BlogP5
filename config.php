<?php

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