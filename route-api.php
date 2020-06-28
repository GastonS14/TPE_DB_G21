<?php
require_once('router.php');
require_once('api/api_controllers/game_api_controller.php');

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
$action = $_GET["action"];
$method = $_SERVER["REQUEST_METHOD"];
$r = new Router();

//GAME
$r->addRoute('gamesil', 'GET', 'game_api_controller', 'get_games');
$r->addRoute('game/:ID', 'GET', 'game_api_controller', 'get_game');
$r->addRoute('game/:ID', 'DELETE', 'game_api_controller', 'delete_game');
$r->addRoute('game', 'POST', 'game_api_controller', 'add_game');
$r->addRoute('game/:ID', 'PUT', 'game_api_controller', 'update_game');

//COMMENTS
$r->addRoute('comments/:ID', 'GET', 'game_api_controller', 'get_comments_game');//id_juego
$r->addRoute('comment/:ID', 'DELETE', 'game_api_controller', 'delete_comment');
$r->addRoute('comment', 'POST', 'game_api_controller', 'add_comment');
$r->addRoute('comment/:ID', 'GET', 'game_api_controller', 'get_comment');//id_juego
$r->addRoute('comment_rating/:ID', 'GET', 'game_api_controller', 'get_comment_rating');//id_comentario

// rutea
$r->route($action, $method);

