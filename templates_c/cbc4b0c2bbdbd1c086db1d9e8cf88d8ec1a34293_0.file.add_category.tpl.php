<?php
/* Smarty version 3.1.33, created on 2020-06-28 00:11:06
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\add_category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef7c3fa06a3e6_09734645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbc4b0c2bbdbd1c086db1d9e8cf88d8ec1a34293' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\add_category.tpl',
      1 => 1593295784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef7c3fa06a3e6_09734645 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="separation">
    </div>
	<div class="weight_form_small">
		<form action="save_category" method="POST" >
			<div class="form-group col-md-10 offset-1">
			    <input type="number" class="form-control" name="id_categoria" id="id_categoria" placeholder="Categoria">
				<small id="id_categoria" class="form-text text-muted">Id categoria</small>
			</div>
			<div class="form-group col-md-10 offset-1">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="nombre_categoria"></textarea>
			    <small id="nombre_categoria" class="form-text text-muted">Nombre categoria</small>
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
	</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
