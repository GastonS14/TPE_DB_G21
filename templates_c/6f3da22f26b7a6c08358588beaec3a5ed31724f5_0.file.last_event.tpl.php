<?php
/* Smarty version 3.1.33, created on 2020-06-29 16:43:36
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\last_event.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef9fe189ed5d8_30817199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f3da22f26b7a6c08358588beaec3a5ed31724f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\last_event.tpl',
      1 => 1593441813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef9fe189ed5d8_30817199 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id evento</th>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['last_event_list']->value, 'last_event');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['last_event']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['last_event']->value->id_evento;?>
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
}
}
