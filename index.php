<?php
session_start();
require 'config.php';
require 'vendor/autoload.php';

use App\Router;

$router = new Router($_GET['url']);
$router->renderController();

