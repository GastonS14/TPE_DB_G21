<?php
/* Smarty version 3.1.33, created on 2019-10-31 20:39:58
  from 'C:\xampp\htdocs\game\templates\add_category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb388ec493c5_11018695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc8c9af0bc4779d76db0e18027af40667eb93812' => 
    array (
      0 => 'C:\\xampp\\htdocs\\game\\templates\\add_category.tpl',
      1 => 1572550796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dbb388ec493c5_11018695 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="separation">
    </div>
	<div class="weight_form_small">
		<form action="save_category" method="POST" >
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="nombre_categoria">Categoria</label>
				    <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" placeholder="Categoria">
				</div>
				<div class="form-group col-md-6">
					<label for="descripcion">Descripcion</label>
				    <input type="text" class="form-control" name="descripcion"id="descripcion" placeholder="Descripcion">
			    </div>
			</div>
			<div class="form-row">
				<input type="submit" name="save" value="Agregar" class="btn btn-primary form-group col-md-6">
				<input type="submit" name="cancel" value="Cancelar" class="btn btn-primary form-group col-md-6">
			</div>
		</form>
	</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
