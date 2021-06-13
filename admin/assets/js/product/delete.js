const listProducts = document.querySelector('#list tbody');

deleteListener();

function deleteListener() {
  listProducts.addEventListener('click', eliminarContacto);
}

function eliminarContacto(e) {
    if (e.target.classList.contains('bg-gradient-danger')) {
      const id = e.target.getAttribute('data-id');
      //console.log(id);
      //preguntar al usuario
      const respuesta = confirm("pregunta");
  
      if (respuesta) {
        // llamado a ajax
        const xhr = new XMLHttpRequest();
  
        //abrimos la conexion
        xhr.open('GET', `http://localhost/sergio_magana/product/delete&id=${id}`, true);
  
        //leer la respuesta
        xhr.onload = function () {
          if (this.status === 200) {
            const result = JSON.parse(xhr.responseText);
            if(result.result === 'true'){
              //console.log(e.target.parentElement.parentElement.parentElement);
              e.target.parentElement.parentElement.remove();
            }
          }
        }
        xhr.send();
      }
    }
  }