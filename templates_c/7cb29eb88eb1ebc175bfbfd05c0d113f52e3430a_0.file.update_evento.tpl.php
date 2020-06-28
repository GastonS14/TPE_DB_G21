<?php
/* Smarty version 3.1.33, created on 2020-06-28 21:32:09
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\update_evento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef8f0394bf551_05518777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cb29eb88eb1ebc175bfbfd05c0d113f52e3430a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\update_evento.tpl',
      1 => 1593372727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef8f0394bf551_05518777 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<div class="separation">
    </div>
	<div class="weight_form_small">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['evento_detail']->value, 'evento');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['evento']->value) {
?>
			<form action="save_update_evento/<?php echo $_smarty_tpl->tpl_vars['evento']->value->id_evento;?>
" method="POST" enctype="multipart/form-data">
				<div class="form-group col-md-10 offset-1">
					<input type="number" class="form-control" name="id_evento" id="id_evento" placeholder="Id evento" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value->id_evento;?>
">
					<small id="id_evento" class="form-text text-muted">Id evento</small>
				</div>
				<div class="form-group col-md-10 offset-1">
					<input type="text" class="form-control" name="nombre_evento" id="nombre_evento" placeholder="nombre evento" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value->nombre_evento;?>
">
					<small id="nombre_evento" class="form-text text-muted">nombre evento</small>
				</div>
				<div class="form-group col-md-10 offset-1">
					<input type="text" class="form-control" name="descripcion_evento" id="descripcion_evento" placeholder="descripion evento" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value->descripcion_evento;?>
">
					<small id="descripcion_evento" class="form-text text-muted">descripion evento</small>
				</div>
				<div class="form-group col-md-10 offset-1"> 	
					<select name="id_categoria/id_subcategoria" class="form-control">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcategorias_list']->value, 'subcategorias');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subcategorias']->value) {
?>
							<option><?php echo $_smarty_tpl->tpl_vars['subcategorias']->value->id_categoria;?>
/<?php echo $_smarty_tpl->tpl_vars['subcategorias']->value->id_subcategoria;?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
					<small id="id_categoria_id_subcategoria" class="form-text text-muted">Id categoria, Id subcategoria</small>	
				</div>
				<div class="form-group col-md-10 offset-1"> 	
					<select name="email" class="form-control">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios_list']->value, 'usuarios');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['usuarios']->value) {
?>
							<option><?php echo $_smarty_tpl->tpl_vars['usuarios']->value->email;?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
					<small id="email" class="form-text text-muted">Email de usuario</small>	
				</div>
				<div class="form-group col-md-10 offset-1"> 	
					<select name="id_distrito" class="form-control">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['distritos_list']->value, 'distritos');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['distritos']->value) {
?>
							<option><?php echo $_smarty_tpl->tpl_vars['distritos']->value->id_distrito;?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						<option></option>
					</select>
					<small id="id_distrito" class="form-text text-muted">Id distrito</small>	
				</div>
				<div class="form-group col-md-10 offset-1">
					<input type="number" class="form-control" name="dia_evento" id="dia_evento" placeholder="dia evento" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value->dia_evento;?>
">
					<small id="dia_evento" class="form-text text-muted">dia evento</small>
				</div>
				<div class="form-group col-md-10 offset-1">
					<input type="number" class="form-control" name="mes_evento" id="mes_evento" placeholder="mes evento" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value->mes_evento;?>
">
					<small id="mes_evento" class="form-text text-muted">Mes evento</small>
				</div>
				<div class="form-group col-md-10 offset-1">
					<input type="number" class="form-control" name="repetir" id="repetir" placeholder="repetir" value="<?php echo $_smarty_tpl->tpl_vars['evento']->value->repetir;?>
">
					<small id="repetir" class="form-text text-muted">repetir</small>
				</div>
				<div class="d-flex flex-column">
					<div class="p-2 col-md-8 offset-2">
					  	<input type="submit" name="save" value="Guardar" class="btn btn-primary form-group col-md-12">
					</div>
					<div class="p-2 col-md-8 offset-2">
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
