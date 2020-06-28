<?php
	require_once ('controllers/evento_controller.php');
	require_once ('controllers/category_controller.php');
	require_once ('controllers/user_controller.php');
	require_once ('router.php');

	define('BASE_URL', 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
	define('evento', BASE_URL . 'evento');
	define('ediciones_evento', BASE_URL . 'ediciones_evento');
	define('category', BASE_URL . 'category');
	define('subcategories', BASE_URL . 'subcategories');
	define('login', BASE_URL . 'login');
	define('logout', BASE_URL . 'logout');
	define('update_game', BASE_URL . 'update_game');
	define('update_category', BASE_URL . 'update_category');
	define('user', BASE_URL . 'user');
	$r = new Router();
	//$r->setDefaultRoute('user_controller', 'login');

	$action = $_GET["action"];
	$method = $_SERVER["REQUEST_METHOD"];

	//USER
	$r->addRoute('user', 'GET', 'user_controller', 'get_users');
	$r->addRoute('delete_user/:ID', 'GET', 'user_controller', 'delete_user');
	$r->addRoute('update_user/:ID','GET','user_controller','update_user');
	$r->addRoute('save_update_user/:ID', 'POST', 'user_controller', 'save_update_user');

	//LOGIN
	$r->addRoute('login', 'GET', 'user_controller', 'login');
	$r->addRoute('logout', 'GET', 'user_controller', 'logout');
	$r->addRoute('login_verify', 'POST', 'user_controller', 'login_verify');

	//EVENTOS.      ($url,	$verb, 	   $controller,		$method)
	$r->addRoute('evento', 'GET', 'evento_controller', 'get_eventos');
	$r->addRoute('ediciones_evento/:ID', 'GET', 'evento_controller', 'get_ediciones_evento');
	$r->addRoute('add_evento', 'GET', 'evento_controller', 'add_evento');
	$r->addRoute('save_evento','POST','evento_controller','save_evento');
	$r->addRoute('update_evento/:ID','GET','evento_controller','update_evento');
	$r->addRoute('save_update_evento/:ID', 'POST', 'evento_controller', 'save_update_evento');





	$r->addRoute('evento/:ID', 'GET', 'evento_controller', 'get_ediciones_evento');
	$r->addRoute('sorted_event/:ID','GET','evento_controller','sorted_event');
	

	//CATEGORY
	$r->addRoute('category', 'GET', 'category_controller', 'get_categories');
	$r->addRoute('add_category', 'GET', 'category_controller', 'add_category');
	$r->addRoute('update_category/:ID','GET','category_controller','update_category');
	//save when add category
	$r->addRoute('save_category','POST','category_controller','save_category');
	//save when edit category
	$r->addRoute('save_update_category/:ID','POST','category_controller','save_update_category');
	$r->addRoute('delete_category/:ID', 'GET', 'category_controller', 'delete_category');
	
	//SUBCATEGORY
	$r->addRoute('subcategories/:ID', 'GET', 'category_controller', 'get_subcategories');
	$r->addRoute('add_subcategory/:ID', 'GET', 'category_controller', 'add_subcategory');
	//save when add category
	$r->addRoute('save_subcategory','POST','category_controller','save_subcategory');
	$r->addRoute('delete_subcategory/:ID/:IG', 'GET', 'category_controller', 'delete_subcategory');


	$r->route($action, $method);