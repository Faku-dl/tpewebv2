<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-03 02:57:22
  from 'C:\xampp\htdocs\tpeweb2\templates\comentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc84602947bb5_56470044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73712b1c6bce4b1c50c9dcfa4be57a80c2b95d25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tpeweb2\\templates\\comentarios.tpl',
      1 => 1606960640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc84602947bb5_56470044 (Smarty_Internal_Template $_smarty_tpl) {
?><body>

<div class="container">
<h5> A continuación se muestran los comentarios sobre <?php echo $_smarty_tpl->tpl_vars['alumno_s']->value->nombre_alumno;?>
:</h5>
        <div class="row">
            <div class="col-12">
                <div class="comments">
                    <div class="comment-box add-comment">
                        <span class="commenter-pic">
                            <!--<img src="../imgs/avatar.png" class="img-fluid">-->
                        </span>
                        <?php if ((isset($_SESSION['nombre_usuario']))) {?>}
    
                            <div class="commenter-name">
                                <p id="usuario"><?php echo $_SESSION['nombre_usuario'];?>
</p>
                                <input id="contenido" type="text" placeholder="¿Como se comporta este alumno?" name="Add Comment">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Valoracion del Alumno</label>
                                    <select class="form-control" id="select">
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    </select>
                                </div>
                                <button id="enviarComentario" type="submit" class="btn btn-success">Publicar</button>
                            </div>
                            <?php } else { ?>
                            <input id="enviarComentario" type="hidden">
                        <?php }?>
                    </div>

                    <div id="cajaComentarios" class="comment-box">

                    </div>
                    <?php if (empty($_SESSION['ADMIN']) || ($_SESSION['ADMIN'] == 0)) {?>
                        <input id="admin" type="hidden" value="0">
                        <?php } else { ?>
                        <input id="admin" type="hidden" value="1">
                    <?php }?>
                </div>
            </div>
        </div>
</body>

<?php echo '<script'; ?>
 src="js/javascript.js"><?php echo '</script'; ?>
><?php }
}
