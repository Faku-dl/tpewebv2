<body>

<div class="container">
<h5> A continuación se muestran los comentarios sobre {$alumno_s->nombre_alumno}:</h5>
        <div class="row">
            <div class="col-12">
                <div class="comments">
                    <div class="comment-box add-comment">
                        <span class="commenter-pic">
                            <!--<img src="../imgs/avatar.png" class="img-fluid">-->
                        </span>
                        {if isset($smarty.session.nombre_usuario)}}
    
                            <div class="commenter-name">
                                <p id="usuario">{$smarty.session.nombre_usuario}</p>
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
                            {else}
                            <input id="enviarComentario" type="hidden">
                        {/if}
                    </div>

                    <div id="cajaComentarios" class="comment-box">

                    </div>
                    {if empty($smarty.session.ADMIN) or  ($smarty.session.ADMIN eq 0)}
                        <input id="admin" type="hidden" value="0">
                        {else}
                        <input id="admin" type="hidden" value="1">
                    {/if}
                </div>
            </div>
        </div>
</body>

<script src="js/javascript.js"></script>