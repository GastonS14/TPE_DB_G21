<?php
/* Smarty version 3.1.33, created on 2020-06-28 01:54:21
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\add_subcategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef7dc2dddf1d2_37618444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eccb8601a0406a8b69ec7d6eb7b301bb65b8f4de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\add_subcategory.tpl',
      1 => 1593301884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef7dc2dddf1d2_37618444 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="separation">
    </div>
	<div class="weight_form_small">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['add_categoria']->value, 'id_categoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id_categoria']->value) {
?>
		<form action="save_subcategory" method="POST" >
			<div class="form-group col-md-10 offset-1">
			    <input type="number" class="form-control" name="id_categoria" id="id_categoria" placeholder="Categoria" value="<?php echo $_smarty_tpl->tpl_vars['id_categoria']->value;?>
">
				<small id="id_categoria" class="form-text text-muted">Id categoria</small>
			</div>
			<div class="form-group col-md-10 offset-1">
			    <input type="number" class="form-control" name="id_subcategoria" id="id_subcategoria" placeholder="Subcategoria">
				<small id="id_subcategoria" class="form-text text-muted">Id subcategoria</small>
			</div>
			<div class="form-group col-md-10 offset-1">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="nombre_subcategoria"></textarea>
			    <small id="nombre_categoria" class="form-text text-muted">Nombre subcategoria</small>
			</div>
			<div class="d-flex flex-column">
				<div class="p-2 col-md-6 offset-3">
			  		<input type="submit" name="save" value="Agregar" class="btn btn-primary form-group col-md-12">
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
