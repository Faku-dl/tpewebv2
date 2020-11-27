<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="comments">
          <div class="comment-box add-comment">
            <span class="commenter-pic">
              <img src="/images/user-icon.jpg" class="img-fluid">
            </span>
            <span class="commenter-name"><p id="usuario" >{$usuario}</p> 
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

<script src="js/javascript.js"></script>