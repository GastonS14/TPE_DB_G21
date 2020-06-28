<?php
/* Smarty version 3.1.33, created on 2019-12-02 23:11:12
  from 'C:\xampp\htdocs\TPE_WEB2\templates\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de58c0010df91_69092496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f106fe9069d8a67fef8291846fc2f743e69ddc51' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_WEB2\\templates\\user.tpl',
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
function content_5de58c0010df91_69092496 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="separation">
    </div>
    <div class="weight_form_small">
        <table class= "table table-striped">
            <thead>
                <tr>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <th>Email</th>
                    <?php }?>
                    <th>Acción usuario</th>
                    <th>Niveles de permisos</th>
                    <th>Editar permisos</th>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_list']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</td>
                        <td><a href='delete_user/<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
'>Borrar</a></td>
                        <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value->id_permiso;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == 1) {?>
                                Administrador
                            <?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['user']->value->id_permiso;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == 2) {?>
                                Registrado
                            <?php } else { ?>
                                Invitado
                            <?php }}?>
                        </td>
                        <td><a href='update_user/<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
'>Editar</a></td>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
            </tbody>
        </table>
    </div>    
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
