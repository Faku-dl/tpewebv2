<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="comments">
                    <div class="comment-box add-comment">
                        <span class="commenter-pic">
                            <!--<img src="../imgs/avatar.png" class="img-fluid">-->
                        </span>
                        <div class="commenter-name">
                            <p id="usuario">{$usuario}</p>
                            <input id="contenido" type="text" placeholder="Comentá, loro!" name="Add Comment">
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
                            <!--<button id="borrarComentario" type="button" class="btn btn-light">Cancelar</button>-->
                            <button id="enviarComentario" type="submit" class="btn btn-success">Publicar</button>
                        </div>
                    </div>

                    <div id="cajaComentarios" class="comment-box">

                    </div>
                </div>
            </div>
        </div>
</body>

<script src="js/javascript.js"></script>