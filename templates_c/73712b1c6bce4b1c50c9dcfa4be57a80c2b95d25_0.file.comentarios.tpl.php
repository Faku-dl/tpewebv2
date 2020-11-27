<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-27 04:17:29
  from 'C:\xampp\htdocs\tpeweb2\templates\comentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc06fc9766e44_51952206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73712b1c6bce4b1c50c9dcfa4be57a80c2b95d25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tpeweb2\\templates\\comentarios.tpl',
      1 => 1606447045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc06fc9766e44_51952206 (Smarty_Internal_Template $_smarty_tpl) {
?><body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="comments">
          <div class="comment-box add-comment">
            <span class="commenter-pic">
              <img src="/images/user-icon.jpg" class="img-fluid">
            </span>
            <span class="commenter-name"><p id="usuario" ><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</p> 
              <input id="contenido" type="text" placeholder="Comentá, loro!" name="Add Comment">
              <button id="enviarComentario" type="submit" class="btn btn-success">Publicar</button>
              <button type="button" class="btn btn-light">Cancelar</button>
            </span>
          </div>
          
          <div id= "cajaComentarios"class="comment-box">
            <!--<span class="commenter-pic">
              <img src="/images/user-icon.jpg" class="img-fluid">
            </span>
            <span class="commenter-name">
              <a href="#">Nombre del loro</a>
            </span>
            <p class="comment-txt more">Comentario</p>
            <div class="comment-meta">
              <button type="button" class="btn btn-outline-warning">Editar</button>
              <button type="button" class="btn btn-outline-danger">Eliminar</button>
            </div>
          </div>-->

        </div>
      </div>
    </div>
  </div>
</body>

<?php echo '<script'; ?>
 src="js/javascript.js"><?php echo '</script'; ?>
><?php }
}
