{include file="header.tpl"}
<ul class="list-group">
    <input type="hidden" id="id_alumno" value="{$alumno_s->id_alumno}">
    <div class="d-flex justify-content-center align-items-center list-group-item">
    <img src="{$alumno_s->imagen}" class="mr-3 mt-3 rounded-circle" style="width:125px;">
    <h3 id="nombre_alumno" class="text-center">{$alumno_s->nombre_alumno}</h3>
    </div>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal24">Eliminar la imágen</button>
    <li class="list-group-item text-center">Email: {$alumno_s->email} </li>
    <li class="list-group-item text-center">Conducta: {$alumno_s->conducta}</li>
    <li class="list-group-item text-center">Calificación: {$alumno_s->calificacion}</li>
    <li class="list-group-item text-center">Materia: {$asignatura_s->nombre_materia} </li>
    <li class="list-group-item text-center">Titular a cargo: {$asignatura_s->profesor}</li>
    <li class="list-group-item text-center">Curso: {$asignatura_s->curso}</li>
</ul>

<div class="modal" tabindex="-1" role="dialog" id="myModal24">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Imágen de {$alumno_s->nombre_alumno}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Realmente desea eliminar esta imágen tan bonita?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="borrarImagen/{$alumno_s->id_alumno}">Sí, no me gusta</a></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, es hermosa</button>
      </div>
    </div>
  </div>
</div>
<br>
<h5 > A continuación se muestran los comentarios sobre {$alumno_s->nombre_alumno}:</h5>
{include file="comentarios.tpl"}
{include file="footer.tpl"}