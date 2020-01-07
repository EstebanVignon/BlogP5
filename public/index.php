<?php
session_start();
include_once '../config.php';
include_once CLASSES . 'MyAutoload.php';
MyAutoload::start();
$router = new Router($_GET['url']);
$router->renderController();

