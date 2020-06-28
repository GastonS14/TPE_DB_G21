<?php
/* Smarty version 3.1.33, created on 2019-10-31 22:05:14
  from 'C:\xampp\htdocs\game\templates\update_category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb4c8ab39de9_89799068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f60487e577fc62cd805ca286c1f3b9c11637f055' => 
    array (
      0 => 'C:\\xampp\\htdocs\\game\\templates\\update_category.tpl',
      1 => 1572555907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dbb4c8ab39de9_89799068 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="weight_form_small">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category_detail']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
			<form action="save_update_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
" method="POST">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" name="nombre_categoria" class="form-control"  placeholder="Categoria" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
">
					</div>
					<div class="form-group col-md-6">
						<input type="text" name="descripcion" class="form-control"  placeholder="Categoria" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->descripcion;?>
">
					</div>	
				</div>
				<div class="form-row">
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
