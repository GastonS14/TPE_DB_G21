<?php
/* Smarty version 3.1.33, created on 2019-11-01 00:32:19
  from 'C:\xampp\htdocs\game\templates\update_game.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb6f03569f90_17670263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4193cbb97b5593c8247061810b6507b9b492b2e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\game\\templates\\update_game.tpl',
      1 => 1572564726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dbb6f03569f90_17670263 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="weight_form_small">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['game_detail']->value, 'game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['game']->value) {
?>
			<form action="save_update_game/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
" method="POST">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" name="id_juego" class="form-control" id="id_juego" placeholder="Id juego" value="<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
" DISABLED>
					</div>
					<div class="form-group col-md-6">
						<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $_smarty_tpl->tpl_vars['game']->value->nombre;?>
">
					</div>
					<div class="form-group col-md-6">
						<input type="text" name="plataforma" class="form-control" id="plataforma" placeholder="Plataforma" value="<?php echo $_smarty_tpl->tpl_vars['game']->value->plataforma;?>
" >
					</div>	
					<div class="form-group col-md-6">
						<input type="text" name="categoria" class="form-control" id="categoria" placeholder="Categoria" value="<?php echo $_smarty_tpl->tpl_vars['game']->value->categoria;?>
" >
					</div>
				</div>
				<div>
					<input type="submit" name="save" value="Guardar" class="btn btn-primary form-group col-md-12">
					<input type="submit" name="cancel" value="Cancelar" class="btn btn-primary form-group col-md-12">
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
