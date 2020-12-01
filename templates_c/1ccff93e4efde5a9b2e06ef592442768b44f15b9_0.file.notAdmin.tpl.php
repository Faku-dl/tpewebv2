<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-01 01:38:28
  from 'C:\xampp\htdocs\tpeweb2\templates\notAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc59084b4c532_51761444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ccff93e4efde5a9b2e06ef592442768b44f15b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tpeweb2\\templates\\notAdmin.tpl',
      1 => 1606783107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fc59084b4c532_51761444 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="justify-content-center">
    <br>
    <h1 class="text-danger"> Acceso denegado</h1>
    <h3>Usted no es Adminstrador. Favor de loguearse con una cuenta con tales permisos.</h3>
    </div>
    <br>
<div class= "d-flex justify-content-center">
    <button type="button" class="btn btn-danger "><a class="text-white text-decoration-none" href="main"> Regresar </a></button>
</div>
<div style="height: 100px">
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
