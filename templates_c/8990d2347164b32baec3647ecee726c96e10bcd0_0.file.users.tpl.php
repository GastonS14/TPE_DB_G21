<?php
/* Smarty version 3.1.33, created on 2019-11-19 08:42:45
  from 'E:\xampp\htdocs\TPE_WEB2\templates\users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd39cf58a3e81_50185166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8990d2347164b32baec3647ecee726c96e10bcd0' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TPE_WEB2\\templates\\users.tpl',
      1 => 1574149362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dd39cf58a3e81_50185166 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="separation">
    </div>
    <div class="weight_form_small">
        <table class= "table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Acción usuario</th>
                    <th>Permisos</th>
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
                        <td><a href='delete/<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
'>Borrar</a></td>
                        <td><a href='update_user/<?php echo $_smarty_tpl->tpl_vars['game']->value->user;?>
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
