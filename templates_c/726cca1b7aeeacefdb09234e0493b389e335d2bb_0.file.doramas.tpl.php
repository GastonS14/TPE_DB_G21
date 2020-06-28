<?php
/* Smarty version 3.1.33, created on 2019-10-07 20:52:43
  from 'C:\xampp\htdocs\WEBII\18-Dimeglio,Juliana-Fernandez,Georgina\templates\doramas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d9b897b0f7c96_10017207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '726cca1b7aeeacefdb09234e0493b389e335d2bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEBII\\18-Dimeglio,Juliana-Fernandez,Georgina\\templates\\doramas.tpl',
      1 => 1570474361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d9b897b0f7c96_10017207 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</title>
</head>
<body id="favoritos">
   <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
        <div>
            <h3>Durante Octubre el género destacado es: <span id="txtDestacado">Romance</span></h3>
        </div>
        <input id="buscar" class="form-control" type="text" placeholder="Buscar" />
        <table id="datos" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Dorama</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Genero</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            </tbody>
        </table>
        <form>
            <div class="form-group">
                <h4>Ingresa tu <strong>Dorama <?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
 </strong>  para que todos puedan conocerlo!!!</h4>
            </div>
            <div class="form-group">
                <input type="text" id="dorama" class="miDorama form-control" id="formGroupExampleInput" placeholder="Dorama">
            </div>
            <div class="form-group">
                <input type="text" id="usuario" class="miDorama form-control" id="formGroupExampleInput2" placeholder="Usuario">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <select id="genero" class="miDorama form-control">
                        <option disabled selected>Género...</option>
                        <option value="Acciòn y Aventura">Acciòn y Aventura</option>
                        <option value="Comedia">Comedia</option>
                        <option value="Històrico">Històrico</option>
                        <option value="Drama">Drama</option>
                        <option value="Romance">Romance</option>
                    <option value="Fantasìa">Fantasìa</option>
                    </select>
                </div>
            </div> 
        </form>
        <button type="button" id="cargar" class="btn btn-outline-primary">Cargar</button>
        <button type="button" id="cargar3" class="btn btn-outline-secondary">Cargar 3</button>
        <button type="button" id="borrar" class="btn btn-outline-success">Borrar</button>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/json.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
