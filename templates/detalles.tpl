{include file="header.tpl"}
{if $asignatura_s neq null}
    <h3 class="display-3">Alumnos que cursan la materia</h3>
    
    {foreach from=$asignatura_s item= alumno}
        <ul><li>{$alumno->nombre_alumno}</li>
        </ul>
    {/foreach}
    {else}
    <h3 class="display-3">No hay alumnos en esta materia</h3>
        
{/if}
{include file="footer.tpl"}