{include file="header.tpl"}

<div class="container mh-100" style="height:500px">
    <div class="container d-flex justify-content-around">
        <div class="card" style="width:350px">
            <img class="card-img-top" src="imgs/materaa.jpg" alt="Materias" style="width:100%">
            <div class="card-body">
                <br>
                <h4 class="card-title">Materias</h4>
                <p class="card-text">Aquí se muestran todas las materias</p>
                <a href="tablaMaterias" class="btn btn-outline-primary stretched-link">Ver las Materias</a>
            </div>
        </div>

        <div class="card" style="width:350px">
            <img class="card-img-top" src="imgs/alumno.jpg" alt="Alumnos" style="width:100%">
            <div class="card-body">
                <h4 class="card-title">Alumnos</h4>
                <p class="card-text">Aquí tenemos a nuestros alumnos</p>
                <a href="tablaAlumnos" class="btn btn-outline-primary stretched-link">Ver todos los Alumnos</a>
            </div>
        </div>
        <!-- Solo se debe poder ver si el usuario es Admin-->
        <div class="card" style="width:325px">
            <img class="card-img-top" src="imgs/users.png" alt="Usuarios" style="width:90%">
            <div class="card-body">
                <h4 class="card-title">Usuarios</h4>
                <p class="card-text">Acceso a usuarios (Top secret)</p>
                <a href="usuarios" class="btn btn-outline-info stretched-link">Ver todos los Usuarios</a>
            </div>
        </div>
        
    </div>
</div>
{include file="footer.tpl"}