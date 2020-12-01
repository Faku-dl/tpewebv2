<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-30 20:48:17
  from 'C:\xampp\htdocs\tpeweb2\templates\tablaUsuarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc54c81f05912_18402363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f34e985456fe564888f69e56ccd2bb7f91f78032' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tpeweb2\\templates\\tablaUsuarios.tpl',
      1 => 1606765696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fc54c81f05912_18402363 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <div class="col-9">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Borrar</th>
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
                        <?php if (($_smarty_tpl->tpl_vars['usuario']->value->administrador == 0)) {?>
                        <td class="text-info font-weight-bold">Usuario</td>
                        <?php } else { ?>
                        <td class="text-success font-weight-bold">Admin</td>
                        <?php }?>
                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->email;?>
</td>
                        
                        <!-- Estos solo se pueden ver si uno es Admin -->

                        <?php if (($_smarty_tpl->tpl_vars['usuario']->value->administrador == 0)) {?>
                            <td> <button type="button" class="btn btn-warning"> <a href="cambiarPermiso/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id_usuario;?>
">Otorgar permisos</a></button> </td>
                        <?php } elseif (($_smarty_tpl->tpl_vars['usuario']->value->nombre_usuario == 'Peron')) {?>
                            <td> <button type="button" class="btn btn-outline-warning" disabled>Descender a Usuario</button> </td>
                        <?php } else { ?>
                        <td> <button type="button" class="btn btn-warning"> <a href="cambiarPermiso/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id_usuario;?>
">Quitar permisos</a></button> </td>
                        <?php }?>
                        <?php if (($_smarty_tpl->tpl_vars['usuario']->value->nombre_usuario == 'Peron')) {?>
                            <td> <button type="button" class="btn btn-danger" disabled><a class="text-white text-decoration-none">Borrar</a></button></td>                          
                        <?php } else { ?>
                        <td> <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="BorrarUsuario/<?php echo $_smarty_tpl->tpl_vars['usuario']->value->id_usuario;?>
">Borrar</a></button></td>
                        <?php }?>
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
