<?php
/* Smarty version 3.1.33, created on 2019-11-24 05:06:34
  from 'E:\xampp\htdocs\TPE_WEB2\templates\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dda01ca476bd0_51727447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4f31aaba5de0a1bae69eced3788b93730feb1fc' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TPE_WEB2\\templates\\category.tpl',
      1 => 1574568389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dda01ca476bd0_51727447 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="separation">
    </div>
    <div class="weight_form_small">
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
                        <td><?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['category']->value->descripcion;?>
</td>
                        <td><a href= 'category/<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
'>Ver categoria de juego</a> </td>
                        <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                        <td><a href= 'delete_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
'>Borrar</a> </td>
                        <td><a href='update_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
'>Editar</a></td>
                        <?php }?>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
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
