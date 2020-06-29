<?php
/* Smarty version 3.1.33, created on 2020-06-29 16:33:41
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\top_users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef9fbc5b84770_87307656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d600a395ccfb12b79bb5080a97062374d8960b3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\top_users.tpl',
      1 => 1593441219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 2,
    'file:footer.tpl' => 2,
  ),
),false)) {
function content_5ef9fbc5b84770_87307656 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>e_mail</th>
                    <th>Cantidad de eventos</th>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['top_users_list']->value, 'top_users');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['top_users']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['top_users']->value->id_usuario;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['top_users']->value->nombre;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['top_users']->value->apellido;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['top_users']->value->e_mail;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['top_users']->value->cant_eventos_usuario;?>
</td>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='evento'>Volver a eventos</a></td>
                    </tr>
            </tbody>
        </table>
    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <div class="separation">
    </div>
    <div class="weight_form_middle">
        <table class= "table table-striped">
            <thead>
                <tr>
                    <th>Id evento</th>
                    <th>Nombre Evento</th>
                    <th>Descripcion evento</th>
                    <th>Id categoria</th>
                    <th>Id subcategoria</th>
                    <th>Id usuario</th>
                    <th>Id distrito</th>
                    <th>Dia evento</th>
                    <th>Mes evento</th>
                    <th>Repetir</th>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <th></th>
                    <th>Acción</th>
                    <th></th>
                    <?php }?>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td><a href='get_top_users'>Usuarios con mas eventos</a></td>
                    <td></td>
                    <td><a href='get_top_users'>Id_Events(fecha_edicion=primer tri 2020)</a></td>
                    <td><a href='get_top_users'>Distritos + count(events) por distrito</a></td>
                    <td><a href='get_top_users'>Categorías con eventos en todas sus subcategorías.</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['evento_list']->value, 'eventos');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['eventos']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->id_evento;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->nombre_evento;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->descripcion_evento;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->id_categoria;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->id_subcategoria;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->id_usuario;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->id_distrito;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->dia_evento;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->mes_evento;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['eventos']->value->repetir;?>
</td>
                        <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                        <td><a href='update_evento/<?php echo $_smarty_tpl->tpl_vars['eventos']->value->id_evento;?>
'>Editar</a></td>
                        <?php }?>
                        <td><a href='ediciones_evento/<?php echo $_smarty_tpl->tpl_vars['eventos']->value->id_evento;?>
'>Ver ediciones</a></td>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <tr>
                        <td colspan="11"></td>
                        <td><a href= 'add_evento'>Agregar evento</a></td>
                    </tr>
                    <?php }?>   
            </tbody>
        </table>
    </div>    
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
