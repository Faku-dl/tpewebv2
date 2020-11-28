{include file="header.tpl"}
<div class="container">
    <div class="col-9">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Administrador</th>
                    <th>email</th>
                    {if isset($smarty.session.administrador)}
                    <th>Editar</th>
                    <th>Borrar</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach from=$usuarios_s item= usuario}
                    <tr>
                        <td><a href="DetalleAlumno/{$usuario->id_usuario}">{$usuario->nombre_usuario}</a></td>
                        <td>{$usuario->administrador}</td>
                        <td>{$usuario->email}</td>
                        {if isset($smarty.session.administrador)}
                            <input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">Admin
                            
                        <td> <button type="button" class="btn btn-danger"><a class="text-white text-decoration-none" href="BorrarUsuario/{$usuario->id_usuario}">Borrar</a></button></td>
                        {/if}
                        <br>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>







{include file="footer.tpl"}