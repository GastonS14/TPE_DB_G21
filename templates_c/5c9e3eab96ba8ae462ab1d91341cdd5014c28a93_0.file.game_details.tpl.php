<?php
/* Smarty version 3.1.33, created on 2019-12-02 23:52:02
  from 'C:\xampp\htdocs\TPE_WEB2\templates\game_details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de5959283dfc6_30484474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9e3eab96ba8ae462ab1d91341cdd5014c28a93' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE_WEB2\\templates\\game_details.tpl',
      1 => 1575321811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5de5959283dfc6_30484474 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Plataforma</th>
                    <th>Categoria</th>
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <th></th>
                    <th>Acción</th>
                    <?php }?>
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
                    <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value == 1)) {?>
                    <td><a href='delete/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
'>Borrar</a></td>
                    <td><a href='update_game/<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
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
                    <td><a href='add_game'>Agregar juego</a></td>
                </tr>
                <?php }?>   
            </tbody>
        </table>
        <div class="img-container-add-game">
            <div class="img-center">
                <?php if (isset($_smarty_tpl->tpl_vars['game']->value->imagen)) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['game']->value->imagen;?>
" class="img-fluid img-thumbnail img-center"/>
                <?php }?>     
            </div>
        </div>
        <?php if (($_smarty_tpl->tpl_vars['user_permiso']->value != 3)) {?>
        <div class="container_comments">
            <form action="api/comment" id="form-games" method="POST" class="form_comm">
                <div class="form-group col-md-10 offset-1">
                    <input type="hidden" name="game_id" class="form-control" id="game_id" value="<?php echo $_smarty_tpl->tpl_vars['game']->value->id_juego;?>
">
                </div>
                <div class="form-group row">
                    <div class="col-md-7">
                        <textarea class="form-control" id="comentario" rows="6" name="comentario"></textarea>
                        <small id="comentario" class="form-text text-muted">Agrega un comentario</small>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" name="puntaje" id="puntaje">
                        <small id="nombre" class="form-text text-muted">Puntaje del juego</small>
                        <input type="submit" name="save" value="Agregar" class="btn btn-primary form-group col-md-12">
                    </div>
                </div>  
            </form>
            <ul id="comments">            
            </ul>
        </div>
        <?php }?>
    </div>
    <button id="btnScroll" title="Ir arriba">
            <i class="fas fa-angle-double-up"></i>
    </button>
    <footer>
        <div class="redesSociales">
            <div class="redSocContent">
                <a href="https://twitter.com/login?lang=es" class="font">
                    <i class="fab fa-twitter fa-2x" id="iconTw"></i>
                </a>
            </div>
            <div class="redSocContent">
                <a href="https://www.instagram.com/?hl=es-la" class="font">
                    <i class="fab fa-instagram fa-2x" id="iconInst"></i>
                </a>
            </div>
            <div class="redSocContent">
                <a href="https:www.facebook.com" class="font">
                    <i class="fab fa-facebook-square fa-2x"id="iconFb"></i>
                </a>
            </div>
        </div>
    </footer>
        <?php echo '<script'; ?>
 type="text/javascript" src="./js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="./js/bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="./js/scroll.js"><?php echo '</script'; ?>
>
        <!--<?php echo '<script'; ?>
 src="./js/juegos.js"><?php echo '</script'; ?>
>-->
    </body>
</html>

            <?php }
}
