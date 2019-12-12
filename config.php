<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://' . $host . '/BlogP5/');
define('ROOT', $root . '/BlogP5/');

define('CONTROLLER', ROOT . 'controller/');
define('VIEW', ROOT . 'view/');
define('MODEL', ROOT . 'model/');
define('CLASSES', ROOT . 'classes/');

define('ASSETS', HOST . 'assets/');
