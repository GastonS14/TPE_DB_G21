<?php
require_once('router.php');
require_once('api/api_controller/user_controller.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
$action = $_GET["action"];
$method = $_SERVER["REQUEST_METHOD"];
$r = new Router();

//GAME
$r->addRoute('game', 'GET', 'user_controller', 'top_user_events');

// rutea
$r->route($action, $method);

