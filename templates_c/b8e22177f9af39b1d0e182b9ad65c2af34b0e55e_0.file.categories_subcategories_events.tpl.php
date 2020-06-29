<?php
/* Smarty version 3.1.33, created on 2020-06-29 16:52:33
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\categories_subcategories_events.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efa0031169db5_96530779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8e22177f9af39b1d0e182b9ad65c2af34b0e55e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\categories_subcategories_events.tpl',
      1 => 1593441634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5efa0031169db5_96530779 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='category'>Volver a eventos</a></td>
                    </tr> 
                    <?php }?>   
            </tbody>
        </table>
    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
