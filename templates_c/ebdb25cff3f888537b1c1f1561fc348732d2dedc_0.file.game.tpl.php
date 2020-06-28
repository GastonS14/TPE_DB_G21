<?php
/* Smarty version 3.1.33, created on 2019-10-28 01:29:19
  from 'C:\xampp\htdocs\TPE_gasti\Tpe_WEBII\templates\game.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db6365f45e725_50801448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebdb25cff3f888537b1c1f1561fc348732d2dedc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_gasti\\Tpe_WEBII\\templates\\game.tpl',
      1 => 1572222552,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5db6365f45e725_50801448 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <form action="add_game" method="post">
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="plataforma" placeholder="plataforma">
        <input type="text" name="categoria" placeholder="categoria">
        <input type="submit" value= "Agregar Juego">
    </form>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['game_list']->value, 'game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['game']->value) {
?>
        <li> <?php echo $_smarty_tpl->tpl_vars['game']->value->nombre;?>
, <?php echo $_smarty_tpl->tpl_vars['game']->value->plataforma;?>
, <?php echo $_smarty_tpl->tpl_vars['game']->value->categoria;?>
</li> <a href= 'delete/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>DELETE</a> 
            <form action="update_game" method="post">
                <input type="text" name="nombre" placeholder="nombre">
                <input type="text" name="plataforma" placeholder="plataforma">
                <input type="text" name="categoria" placeholder="categoria">
                <input type="submit" value= "Editar Juego">
            </form> 
            <a href= 'update_game/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>UPDATE</a>
        </li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
