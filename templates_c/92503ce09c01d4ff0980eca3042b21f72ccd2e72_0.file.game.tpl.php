<?php
/* Smarty version 3.1.33, created on 2019-12-03 00:21:31
  from 'C:\xampp\htdocs\TPE_WEB2\templates\game.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de59c7b66fb39_54401059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92503ce09c01d4ff0980eca3042b21f72ccd2e72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_WEB2\\templates\\game.tpl',
      1 => 1575328887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5de59c7b66fb39_54401059 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="separation">
    </div>
    <div class="weight_form_small">
        <table class= "table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Plataforma</th>
                    <th>Categoria</th>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <th></th>
                    <th>Acción</th>
                    <th></th>
                    <?php }?>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['game_list']->value, 'game');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['game']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['game']->value->nombre;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['game']->value->plataforma;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['game']->value->categoria;?>
</td>
                        <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                        <td><a href='delete/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>Borrar</a></td>
                        <td><a href='update_game/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>Editar</a></td>
                        <?php }?>
                        <td><a href='game/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>Ver juego</a></td>
                        <td><a href='sorted_games/<?php echo $_smarty_tpl->tpl_vars['game']->value->categoria;?>
'>Ver juegos con esta categoria</a></td>
                    </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <tr>
                        <td colspan="5"></td>
                        <td><a href= 'add_game'>Agregar juego</a></td>
                    </tr>
                    <?php }?>   
            </tbody>
        </table>
    </div>    
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
