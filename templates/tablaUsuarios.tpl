{include file="header.tpl"}
<div class="container">
    <div class="col-9">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$usuarios_s item= usuario}
                    <tr>
                        <td><a href="DetalleAlumno/{$usuario->id_usuario}">{$usuario->nombre_usuario}</a></td>
                        {if ($usuario->administrador == 0)}
                        <td class="text-info font-weight-bold">Usuario</td>
                        {else}
                        <td class="text-success font-weight-bold">Admin</td>
                        {/if}
                        <td>{$usuario->email}</td>
                        
                        <!-- Estos solo se pueden ver si uno es Admin -->

                        {if ($usuario->administrador eq 0)}
                            <td> <button type="button" class="btn btn-warning"> <a href="cambiarPermiso/{$usuario->id_usuario}">Otorgar permisos</a></button> </td>
                        {elseif ($usuario->nombre_usuario eq Peron)}
                            <td> <button type="button" class="btn btn-outline-warning" disabled>Descender a Usuario</button> </td>
                        {else}
                        <td> <button type="button" class="btn btn-warning"> <a href="cambiarPermiso/{$usuario->id_usuario}">Quitar permisos</a></button> </td>
                        {/if}
                        {if ($usuario->nombre_usuario eq Peron)}
                            <td> <button type="button" class="btn btn-danger" disabled><a class="text-white text-decoration-none">Borrar</a></button></td>                          
                        {else}
                        <td> <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="BorrarUsuario/{$usuario->id_usuario}">Borrar</a></button></td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>







{include file="footer.tpl"}