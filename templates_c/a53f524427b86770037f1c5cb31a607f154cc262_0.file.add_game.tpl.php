<?php
/* Smarty version 3.1.33, created on 2019-11-23 12:57:10
  from 'E:\xampp\htdocs\TPE_WEB2\templates\add_game.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd91e967e9523_57737503',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a53f524427b86770037f1c5cb31a607f154cc262' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TPE_WEB2\\templates\\add_game.tpl',
      1 => 1574507997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dd91e967e9523_57737503 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="weight_form_small">
	<form action="save_game" method="POST" enctype="multipart/form-data">
		<div class="form-group col-md-10 offset-1">
			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" id="nombre">
			<small id="nombre" class="form-text text-muted">Nombre del juego</small>
		</div>
		<div class="form-group col-md-10 offset-1">
			<input type="text" class="form-control" name="plataforma" id="plataforma" placeholder="Plataforma">
			<small id="nombre" class="form-text text-muted">Plataforma</small>
		</div>
		<div class="form-group col-md-10 offset-1"> 	
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
			<small id="nombre" class="form-text text-muted">Categoría</small>	
		</div>
		<div class="form-group col-md-10 offset-1">
            <input type="file" name="game_img" id="game_img">
    	    <small id="game_img" class="form-text text-muted">Seleccione una imagen</small>
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
?>
		       <?php }
}
