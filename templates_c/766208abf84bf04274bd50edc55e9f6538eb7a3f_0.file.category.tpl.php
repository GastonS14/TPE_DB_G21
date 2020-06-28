<?php
/* Smarty version 3.1.33, created on 2020-06-28 16:43:46
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef8aca2c44ea1_68975966',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '766208abf84bf04274bd50edc55e9f6538eb7a3f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\category.tpl',
      1 => 1593355405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef8aca2c44ea1_68975966 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="separation">
    </div>
    <div class="weight_form_middle">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th></th>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <th></th>
                    <th>Acción</th>
                    <?php }?>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category_list']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['category']->value->id_categoria;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
</td>
                        <td><a href= 'subcategories/<?php echo $_smarty_tpl->tpl_vars['category']->value->id_categoria;?>
'>Ver subcategorias</a> </td>
                        <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1) || ($_smarty_tpl->tpl_vars['user_permiso']->value == 2)) {?>
                        <td><a href= 'delete_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->id_categoria;?>
'>Borrar</a> </td>
                        <td><a href= 'update_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->id_categoria;?>
'>Editar</a></td>
                        <?php }?>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1) || ($_smarty_tpl->tpl_vars['user_permiso']->value == 2)) {?>
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='add_category'>Agregar categoria</a></td>
                    </tr>
                    <?php }?>    
            </tbody>
        </table>
    </div>
    <div class="fond"></div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
