{include file="header.tpl"}
<ul class="list-group">
    <input type="hidden" id="id_alumno" value="{$alumno_s->id_alumno}">
    <div class="d-flex justify-content-center align-items-center list-group-item">
        {if $alumno_s->imagen!= ""}
            <img src="{$alumno_s->imagen}" class="mr-3 mt-3 rounded-circle" style="width:125px;">
        {/if}
        <h3 id="nombre_alumno" class="text-center">{$alumno_s->nombre_alumno}</h3>
    </div>
    <li class="list-group-item text-center">Email: {$alumno_s->email} </li>
    <li class="list-group-item text-center">Conducta: {$alumno_s->conducta}</li>
    <li class="list-group-item text-center">Calificación: {$alumno_s->calificacion}</li>
    <li class="list-group-item text-center">Materia: {$asignatura_s->nombre_materia} </li>
    <li class="list-group-item text-center">Titular a cargo: {$asignatura_s->profesor}</li>
    <li class="list-group-item text-center">Curso: {$asignatura_s->curso}</li>
</ul>
<button type="button" class="btn btn-danger "><a class="text-white text-decoration-none" href="tablaAlumnos/1"> Regresar </a></button>
<br>

{include file="comentarios.tpl"}
{include file="footer.tpl"}