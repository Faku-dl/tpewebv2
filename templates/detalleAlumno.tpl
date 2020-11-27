{include file="header.tpl"}
<ul class="list-group">
    <input type="hidden" id="id_alumno" value="{$alumno_s->id_alumno}">
    <h3 id="nombre_alumno" class="list-group-item text-center">{$alumno_s->nombre_alumno}</h3>
    <li class="list-group-item">Email: {$alumno_s->email} </li>
    <li class="list-group-item">Conducta: {$alumno_s->conducta}</li>
    <li class="list-group-item">Calificación: {$alumno_s->calificacion}</li>
    <li class="list-group-item">Materia: {$asignatura_s->nombre_materia} </li>
    <li class="list-group-item">Titular a cargo: {$asignatura_s->profesor}</li>
    <li class="list-group-item">Curso: {$asignatura_s->curso}</li>
</ul>
{include file="comentarios.tpl"}
{include file="footer.tpl"}