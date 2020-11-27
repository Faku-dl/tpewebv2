"use strict"

document.addEventListener('DOMContentLoaded', () =>{
    traerComentarios();

    document.getElementById("enviarComentario").addEventListener("click", e=>{
      event.preventDefault();
      postComentario();
    })
});

function traerComentarios(){
    const id= document.getElementById("id_alumno").value;
    const url= 'http://localhost/tpeweb2/api/alumnos/'+id;
    const requestOptions = {
        method: 'GET',
        redirect: 'follow',
      };
      
      fetch(url, requestOptions)
        .then(response => response.json())
        .then(comentarios => render(comentarios))
        .catch(error => console.log('error:', error));
}

function render(comentarios){

    const container= document.querySelector("#cajaComentarios");

    comentarios.forEach(comentario => {

        container.innerHTML += `
        <span class="commenter-pic">
              <img src="/images/user-icon.jpg" class="img-fluid">
            </span>
            <span class="commenter-name">
              <a href="#">${comentario.usuario_nombre}</a>
            </span>
            <p class="student-name">${comentario.nombre_alumno}</p>
            <p class="comment-txt more">${comentario.contenido}</p>
            <div class="comment-meta">
              <button id="editComment" type="button" class="btn btn-outline-warning">Editar</button>
              <button id="deleteComment"type="button" class="btn btn-outline-danger">Eliminar</button>
            </div>
        `
});
}
 
document.getElementById("enviarComentario").addEventListener("click", postComentario());

function postComentario(){
    
    const comentario ={
      contenido: document.getElementById("contenido").value,
      usuario_nombre:document.getElementById("usuario").value,
      nombre_alumno: document.getElementById("nombre_alumno").value
    } 
console.log(comentario);
    const url= 'http://localhost/tpeweb2/api/alumnos/';
      fetch({
        method: 'POST',
        header:{ "Content-type":"application/json"},
        body:JSON.stringify(comentario)
      })
      .then(response => response.json())
      .then(result => traerComentarios(result))
      .catch(error => console.log('error', error));
}
