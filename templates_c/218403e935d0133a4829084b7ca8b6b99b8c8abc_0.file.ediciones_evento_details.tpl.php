<?php
/* Smarty version 3.1.33, created on 2020-06-28 17:14:53
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\ediciones_evento_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef8b3edb1ffb1_28748200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '218403e935d0133a4829084b7ca8b6b99b8c8abc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\ediciones_evento_details.tpl',
      1 => 1593357289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef8b3edb1ffb1_28748200 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id evento</th>
                    <th>Nro edicion</th>
                    <th>Fecha inicio pub</th>
                    <th>Fecha fin pub</th>
                    <th>presupuesto</th>
                    <th>Fecha edicion</th>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <th>Acción</th>
                    <?php }?>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ediciones_evento_details']->value, 'ediciones_evento');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ediciones_evento']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->id_evento;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->nro_edicion;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->fecha_inicio_pub;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->fecha_fin_pub;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->presupuesto;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->fecha_edicion;?>
</td>
                        <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1) || ($_smarty_tpl->tpl_vars['user_permiso']->value == 2)) {?>
                        <td><a href= 'delete_evento/<?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->id_evento;?>
/<?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->nro_evento;?>
'>Borrar</a></td>
                        <td><a href='add_ediciones_evento/<?php echo $_smarty_tpl->tpl_vars['ediciones_evento']->value->id_categoria;?>
'>Agregar edicion</a></td>
                        <?php }?>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    
                    <tr>
                        <td colspan="7"></td>
                        <td><a href='evento'>Volver a eventos</a></td>
                    </tr> 
                    <?php }?>   
            </tbody>
        </table>
    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
