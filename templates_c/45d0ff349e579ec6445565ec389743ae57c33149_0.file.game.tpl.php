<?php
/* Smarty version 3.1.33, created on 2020-06-26 15:03:24
  from 'C:\xampp\htdocs\TPE_DB_G21\templates\game.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef5f21c240a08_10826270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45d0ff349e579ec6445565ec389743ae57c33149' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_DB_G21\\templates\\game.tpl',
      1 => 1585785373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef5f21c240a08_10826270 (Smarty_Internal_Template $_smarty_tpl) {
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
