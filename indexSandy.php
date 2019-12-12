<?php

include_once('config.php');

include_once(CLASSES . 'Router.php');

(isset($_GET['action'])) ? $action = $_GET['action'] : $action ="/";

$router = new Router($action);
$router->renderController();

