<?php
/* Smarty version 3.1.33, created on 2019-12-02 23:21:31
  from 'C:\xampp\htdocs\TPE_WEB2\templates\add_category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de58e6b3c4635_76671364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ae2f4448bdfd83767d18a52c3be5dafdbcc0aef' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_WEB2\\templates\\add_category.tpl',
      1 => 1575321811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5de58e6b3c4635_76671364 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="separation">
    </div>
	<div class="weight_form_small">
		<form action="save_category" method="POST" >
			<div class="form-group col-md-10 offset-1">
			    <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" placeholder="Categoria">
				<small id="categoria" class="form-text text-muted">Categoría</small>
			</div>
			<div class="form-group col-md-10 offset-1">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="descripcion"></textarea>
			    <small id="descripcion" class="form-text text-muted">Descripción</small>
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
