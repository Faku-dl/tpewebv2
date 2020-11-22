{include file="header.tpl"}
<p>{$asignatura_s->nombre_materia}</p>
<h3 class="display-3">Titular a cargo:</h3>
<p>{$asignatura_s->profesor}</p>
<h3 class="display-3">Curso:</h3>
<p>{$asignatura_s->curso}</p>
{foreach from=$asignatura_s->nombre_alumno item= alumno}
    <ul><li>{$alumno}</li>
    </ul>
{/foreach}
{include file="footer.tpl"}