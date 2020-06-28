<?php
/* Smarty version 3.1.33, created on 2019-11-24 05:57:15
  from 'E:\xampp\htdocs\TPE_WEB2\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dda0dab028ad3_40089196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '616f19e3a52ff3a09362b9d8befdc57db4afaf5b' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TPE_WEB2\\templates\\header.tpl',
      1 => 1574571430,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda0dab028ad3_40089196 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<base href='http://localhost/TPE_WEB2/game'>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="./css/estilo.css">
	<title>Games</title>
</head>
<body class="fondo">
	<header>
			<nav class="navbar navbar-expand-md navbar-light bg-light">
		  		<a class="navbar-brand" href="">
		  			<h1>Gamerank</h1>
		  		</a>
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>
			  	<div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav">
				     	<li class="nav-item">
				       		<a class="nav-link" href="game">Juegos</a>
				     	</li>
				     	<li class="nav-item rojo">
				        	<a class="nav-link" href="category">Categorías</a>
				     	</li>
				     	<?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
				     	<li class="nav-item active">
				        	<a class="nav-link" href="user">Usuario</a>
				     	</li>
				     	<?php }?>
				     	<li class="nav-item active">
				        	<a class="nav-link" href="logout">Cerrar sesión</a>
				     	</li>
				    </ul>
				</div>
			</nav>
	</header><?php }
}
