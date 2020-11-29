{include file="header.tpl"}
<ul class="list-group">
    <input type="hidden" id="id_alumno" value="{$alumno_s->id_alumno}">
    <h3 id="nombre_alumno" class="list-group-item text-center">{$alumno_s->nombre_alumno}</h3>
    <li class="list-group-item">Email: {$alumno_s->email} </li>
    <img src="{$alumno_s->imagen}"/>
    <li class="list-group-item">Conducta: {$alumno_s->conducta}</li>
    <li class="list-group-item">Calificación: {$alumno_s->calificacion}</li>
    <li class="list-group-item">Materia: {$asignatura_s->nombre_materia} </li>
    <li class="list-group-item">Titular a cargo: {$asignatura_s->profesor}</li>
    <li class="list-group-item">Curso: {$asignatura_s->curso}</li>
</ul>
{include file="comentarios.tpl"}
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal24">Deseo Eliminar la imagen</button>
<div class="modal" tabindex="-1" role="dialog" id="myModal24">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">IMAGEN DE {$alumno_s->nombre_alumno}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>realmente desea eliminar esta imagen tan bonita</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">SIIIIIIIIIIIIII</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELARRRR</button>
      </div>
    </div>
  </div>
</div>
{include file="footer.tpl"}