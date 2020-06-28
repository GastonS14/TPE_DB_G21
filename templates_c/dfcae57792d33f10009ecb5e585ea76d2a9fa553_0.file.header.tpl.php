<?php
/* Smarty version 3.1.33, created on 2019-10-07 21:55:44
  from 'C:\xampp\htdocs\WEBII\18-Dimeglio,Juliana-Fernandez,Georgina\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d9b9840b1b7c6_16422789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfcae57792d33f10009ecb5e585ea76d2a9fa553' => 
    array (
      0 => 'C:\\xampp\\htdocs\\WEBII\\18-Dimeglio,Juliana-Fernandez,Georgina\\templates\\header.tpl',
      1 => 1570478140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d9b9840b1b7c6_16422789 (Smarty_Internal_Template $_smarty_tpl) {
?> <header>
        <nav class="navbar navbar-expand-lg navbar-light home navbar fixed-top ">
            <a class="navbar-brand" href="index.html"><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="actorView.php">Actores</a>
                    <a class="nav-item nav-link active" href="doramaView.php">Doramas</a>
                    <a class="nav-item nav-link active" href="contacto.html" target="_blank">Login Administrador</a>
                </div>
            </div>
        </nav>
    </header><?php }
}
