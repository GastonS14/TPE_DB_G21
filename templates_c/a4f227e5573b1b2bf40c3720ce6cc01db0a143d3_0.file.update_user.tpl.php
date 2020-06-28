<?php
/* Smarty version 3.1.33, created on 2019-11-24 01:37:49
  from 'E:\xampp\htdocs\TPE_WEB2\templates\update_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd9d0dd537c37_40396599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4f227e5573b1b2bf40c3720ce6cc01db0a143d3' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TPE_WEB2\\templates\\update_user.tpl',
      1 => 1574533844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dd9d0dd537c37_40396599 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="separation">
    </div>
	<div class="weight_form_small">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_detail']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
		<form action="save_update_user/<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
" method="POST">
			<div class="form-group col-md-10 offset-1">
				<input type="text" name="email" class="form-control" id="email" placeholder="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
">
				<small id="email" class="form-text text-muted">Email</small>
			</div>
			<div class="form-group col-md-10 offset-1"> 	
				<select name="permiso" class="form-control">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_permisos']->value, 'permisos');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['permisos']->value) {
?>
						<option><?php echo $_smarty_tpl->tpl_vars['permisos']->value->permiso;?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</select>
				<small id="permiso" class="form-text text-muted">Permiso</small>	
			</div>
			<div class="d-flex flex-column">
				<div class="p-2 col-md-6 offset-3">
				  	<input type="submit" name="save" value="Guardar" class="btn btn-primary form-group col-md-12">
				</div>
				<div class="p-2 col-md-6 offset-3">
			  		<input type="submit" name="cancel" value="Cancelar" class="btn btn-primary form-group col-md-12">
				</div>
			</div>	
		</form>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
