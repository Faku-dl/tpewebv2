{include file="header.tpl"}
{include file="sidebarMaterias.tpl"}
<div class="container">
    <div class="col-9">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Materia</th>
                    <th>Profesor</th>
                    <th>Curso</th>
                    {if empty($smarty.session.ADMIN) or  ($smarty.session.ADMIN eq 0)}
               
                        {else}
                        <th>Editar</th>
                        <th>Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach from=$asignatura_s item= materia}
                    <tr>
                        <td><a href="Detalle/{$materia->id_materia}">{$materia->nombre_materia}</a></td>
                        <td>{$materia->profesor}</td>
                        <td>{$materia->curso}</td>
                        {if empty($smarty.session.ADMIN) or ($smarty.session.ADMIN eq 0)}
        
                        {else}
                            <td> <button type="button" class="btn btn-warning"><a class="text-white text-decoration-none" href="Editar/{$materia->id_materia}">Menu</a></button></td>
                            <td> <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="Borrar/{$materia->id_materia}">Borrar</a></button></td>
                        {/if}
                        <br>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
{include file="footer.tpl"}