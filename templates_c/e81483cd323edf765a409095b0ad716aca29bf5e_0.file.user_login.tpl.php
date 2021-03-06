<?php
/* Smarty version 3.1.33, created on 2019-11-19 07:55:10
  from 'E:\xampp\htdocs\TPE_WEB2\templates\user_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd391ce61ad65_45346134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e81483cd323edf765a409095b0ad716aca29bf5e' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TPE_WEB2\\templates\\user_login.tpl',
      1 => 1574146494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dd391ce61ad65_45346134 (Smarty_Internal_Template $_smarty_tpl) {
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
<body class="fondo_login">
	<div class="user_login">
		<form action="login_verify" method="POST" class="user_login_form">
			<div>
				<h1 class="title_page">Gamerank</h1>
			</div>
			<div class="form-group col-md-10 offset-1">
				<input type="text" class="form-control" name="email" id="email" placeholder="Email">
				<small id="emailHelp" class="form-text text-muted">No olvide colocar el @</small>
			</div>
			<div class="form-group col-md-10 offset-1">
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				<small id="password_id" class="form-text text-muted">Password</small>
			</div>
			<div>
				<p class="col-md-10 offset-1"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
			</div>
			<div class="d-flex flex-column">
				<div class="p-2 col-md-10 offset-1">
			  		<input type="submit" class="btn btn-primary col-md-12" name="register" value="Registrarse"></input>
				</div>
				<div class="p-2 col-md-10 offset-1">
			  		<input type="submit" class="btn btn-primary col-md-12" name="login" value="Iniciar sesión"></input>
				</div>
				<div class="p-2 col-md-10 offset-1">
					<input type="submit" class="btn btn-primary col-md-12" name="invited" value="Entrar como invitado"></input>
				</div>
			</div>
		</form>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript" src="./js/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="./js/bootstrap.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
