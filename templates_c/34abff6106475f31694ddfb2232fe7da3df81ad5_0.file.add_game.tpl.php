<?php
/* Smarty version 3.1.33, created on 2019-11-01 03:36:57
  from 'C:\xampp\htdocs\game\templates\add_game.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb9a497defb8_04031765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34abff6106475f31694ddfb2232fe7da3df81ad5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\game\\templates\\add_game.tpl',
      1 => 1572575816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dbb9a497defb8_04031765 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="weight_form_small">
	<form action="save_game" method="POST">
		<div class="form-row">
			<div class="form-group col-md-4">
				<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" id="nombre">
			</div>
			<div class="form-group col-md-4">
				<input type="text" class="form-control" name="plataforma" id="plataforma" placeholder="Plataforma">
			</div>
			<div> 	
				<select name="categoria" class="form-control">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category_list']->value, 'categories');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['categories']->value) {
?>
						<option><?php echo $_smarty_tpl->tpl_vars['categories']->value->nombre_categoria;?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</select>	
			</div>
			<div class="form-row col-md-12">
				<input type="submit" name="save" value="Agregar" class="btn btn-primary form-group col-md-6">
				<input type="submit" name="cancel" value="Cancelar" class="btn btn-primary form-group col-md-6">
			</div>	
		</div>
	</form>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		       <?php }
}
