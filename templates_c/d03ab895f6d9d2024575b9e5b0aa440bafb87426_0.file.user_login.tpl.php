<?php
/* Smarty version 3.1.33, created on 2019-11-01 02:23:14
  from 'C:\xampp\htdocs\game\templates\user_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb89022f5e76_47162853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd03ab895f6d9d2024575b9e5b0aa440bafb87426' => 
    array (
      0 => 'C:\\xampp\\htdocs\\game\\templates\\user_login.tpl',
      1 => 1572571305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dbb89022f5e76_47162853 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="separation">
    </div>
	<div class= "weight_form_small">
		<form action="login_verify" method="POST">
			<div class="form-group">
				<label for="email">Usuario</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="Email">
				<small id="emailHelp" class="form-text text-muted">No olvide colocar el @</small>
			</div>
			<div class="form-group">
				<label for="password_id">Password</label>
				<input type="password" class="form-control" id="password_id" name="password" placeholder="Password">
			</div>
			<div>
				<p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
			</div>
			<div class= "row">
				<input type="submit" class="btn btn-primary col-md-6" name="register" value="Registrarse"></input>
				<input type="submit" class="btn btn-primary col-md-6" name="login" value="Iniciar sesión"></input>
			</div>
		</form>
	</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
