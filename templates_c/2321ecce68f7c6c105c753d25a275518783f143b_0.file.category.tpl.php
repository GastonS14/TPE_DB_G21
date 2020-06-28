<?php
/* Smarty version 3.1.33, created on 2019-10-28 00:32:34
  from 'C:\xampp\htdocs\TPE_gasti\Tpe_WEBII\templates\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db629129bc777_94141047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2321ecce68f7c6c105c753d25a275518783f143b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_gasti\\Tpe_WEBII\\templates\\category.tpl',
      1 => 1572219147,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5db629129bc777_94141047 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <form action="add_category" method="post">
        <input type="text" name="nombre_categoria" placeholder="nombre">
        <input type="text" name="descripcion" placeholder="descripcion">
        <input type="submit" value= "Agregar categoria">
    </form>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category_list']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
        <li> <?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
, <?php echo $_smarty_tpl->tpl_vars['category']->value->descripcion;?>
</li> <a href= 'delete_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre_categoria;?>
'>DELETE</a> <a href= 'update_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre;?>
'>UPDATE</a></li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
