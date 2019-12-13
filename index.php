<?php

include_once('config.php');
CustomAutoload::start();

$request = $_GET['url'];

$router = new Router($request);
$router->renderController();