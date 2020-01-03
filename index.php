<?php
session_start();
include_once 'config.php';
CustomAutoload::start();
$router = new Router($_GET['url']);
$router->renderController();

