{include file="header.tpl"}
{include file="sidebarAlumnos.tpl"}
<div class="container">
    <div class="col-9">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Rostro</th>
                    <th>Alumno</th>
                    <th>Email</th>
                    <th>Conducta</th>
                    <th>Calificación</th>
                    <th>Materia</th>
                    {if empty($smarty.session.ADMIN) or  ($smarty.session.ADMIN eq 0)}
               
                        {else}
                        <th>Editar</th>
                        <th>Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach from=$alumnos_s item= alumno}
                    <tr>
                        <td>
                            <div class="d-flex justify-content-center">
                                <img src="{$alumno->imagen}" class="rounded-circle" style="width:105px;" />
                            </div>
                        </td>
                        <td><a href="DetalleAlumno/{$alumno->id_alumno}">{$alumno->nombre_alumno}</a></td>
                        <td>{$alumno->email}</td>
                        <td>{$alumno->conducta}</td>
                        <td>{$alumno->calificacion}</td>
                        <td>{$alumno->materia}</td>
                        {if empty($smarty.session.ADMIN) or  ($smarty.session.ADMIN eq 0)}
               
                            {else}
                            <td> <button type="button" class="btn btn-warning"><a class="text-white text-decoration-none" href="EditarAlumno/{$alumno->id_alumno}">Menu</a></button></td>
                            <td> <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="BorrarAlumno/{$alumno->id_alumno}">Borrar</a></button>
                                {if $alumno->imagen!= ""}
                                    <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="borrarImagen/{$alumno->id_alumno}">Eliminar Imagen</a></button>
                                {/if}
                            </td>
                        {/if}
                        <br>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
    <ul class="pagination">
        {for $i=1 to $paginas}
            <li class="page-item"><button id="paginacion{$i}" type="button" class="page-link"><a  href="tablaAlumnos/{$i}">{$i}</button></li>
        {/for}
    </ul>
</div>
{include file="footer.tpl"}