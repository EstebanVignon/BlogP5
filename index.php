<?php

use App\Core\Router;

session_start();
require 'config.php';
require 'vendor/autoload.php';

$router = new Router($_GET['url']);
$router->renderController();

