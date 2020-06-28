<?php
/* Smarty version 3.1.33, created on 2020-06-27 20:15:00
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef78ca4e8e071_94138010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69f2592a8b2576d6107fbf1939f49f9c824fdaef' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\user.tpl',
      1 => 1593281574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef78ca4e8e071_94138010 (Smarty_Internal_Template $_smarty_tpl) {
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
