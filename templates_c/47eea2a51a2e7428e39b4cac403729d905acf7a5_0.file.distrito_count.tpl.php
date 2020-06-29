<?php
/* Smarty version 3.1.33, created on 2020-06-29 16:40:16
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\distrito_count.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef9fd50ec5103_68080579',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47eea2a51a2e7428e39b4cac403729d905acf7a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\distrito_count.tpl',
      1 => 1593441615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef9fd50ec5103_68080579 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id distrito</th>
                    <th>Nombre pais</th>
                    <th>Nombre provincia</th>
                    <th>Nombre distrito</th>
                    <th>Cantidad de eventos</th>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['distrito_count_list']->value, 'distrito_count');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['distrito_count']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['distrito_count']->value->id_distrito;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['distrito_count']->value->nombre_pais;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['distrito_count']->value->nombre_provincia;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['distrito_count']->value->nombre_distrito;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['distrito_count']->value->cantidad_eventos;?>
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
