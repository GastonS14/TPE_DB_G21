<?php
/* Smarty version 3.1.33, created on 2019-11-01 03:43:14
  from 'C:\xampp\htdocs\game\templates\game_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb9bc2b51d75_17616380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd7000feb1f1851b5fd2be6e14f4038d0d5ea4a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\game\\templates\\game_details.tpl',
      1 => 1572576191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dbb9bc2b51d75_17616380 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Plataforma</th>
                    <th>Categoria</th>
                    <th></th>
                    <th>Acción</th>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['game_details']->value, 'game');
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
                    <td><a href='delete/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>Borrar</a></td>
                    <td><a href='update_game/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>Editar</a></td>
                </tr> 
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <tr>
                    <td colspan="4"></td>
                    <td><a href='add_game'>Agregar juego</a></td>
                </tr>    
            </tbody>
        </table>
    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
