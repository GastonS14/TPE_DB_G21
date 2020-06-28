<?php
/* Smarty version 3.1.33, created on 2020-06-28 17:12:43
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\subcategories_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef8b36b8db7d4_68490698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b1b78dcaa5da5b085ae0c41d0e4f05e965d1bc1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\subcategories_details.tpl',
      1 => 1593357162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef8b36b8db7d4_68490698 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id categoria</th>
                    <th>Id subcategoria</th>
                    <th>Nombre subcategoria</th>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <th>Acción</th>
                    <?php }?>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcategories_details']->value, 'subcategories');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subcategories']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['subcategories']->value->id_categoria;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['subcategories']->value->id_subcategoria;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['subcategories']->value->nombre_subcategoria;?>
</td>
                        <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1) || ($_smarty_tpl->tpl_vars['user_permiso']->value == 2)) {?>
                        <td><a href= 'delete_subcategory/<?php echo $_smarty_tpl->tpl_vars['subcategories']->value->id_categoria;?>
/<?php echo $_smarty_tpl->tpl_vars['subcategories']->value->id_subcategoria;?>
'>Borrar</a></td>
                        <td><a href='add_subcategory/<?php echo $_smarty_tpl->tpl_vars['subcategories']->value->id_categoria;?>
'>Agregar subcategoria</a></td>
                        <?php }?>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='category'>Volver a categorias</a></td>
                    </tr> 
                    <?php }?>   
            </tbody>
        </table>
    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
