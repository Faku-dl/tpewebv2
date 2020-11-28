<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-28 06:57:43
  from 'C:\xampp\htdocs\tpeweb2\templates\tablaUsuarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc1e6d794bc47_30111885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f34e985456fe564888f69e56ccd2bb7f91f78032' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tpeweb2\\templates\\tablaUsuarios.tpl',
      1 => 1606543060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fc1e6d794bc47_30111885 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="col-9">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Administrador</th>
                    <th>email</th>
                    <?php if ((isset($_SESSION['administrador']))) {?>
                    <th>Editar</th>
                    <th>Borrar</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios_s']->value, 'usuario');
$_smarty_tpl->tpl_vars['usuario']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
$_smarty_tpl->tpl_vars['usuario']->do_else = false;
?>
                    <tr>
                        <td><a href="DetalleAlumno/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id_usuario;?>
"><?php echo $_smarty_tpl->tpl_vars['usuario']->value->nombre_usuario;?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->administrador;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->email;?>
</td>
                        <input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">Admin
                        <?php if ((isset($_SESSION['administrador']))) {?>
                            
                        <td> <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="BorrarUsuario/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id_usuario;?>
">Borrar</a></button></td>
                        <?php }?>
                        <br>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>







<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
