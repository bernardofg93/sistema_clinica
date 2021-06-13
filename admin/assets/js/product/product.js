const formProduct = document.querySelector("#formProduct");
// editFormProduct = document.querySelector("#editFormProduct"),
eventListener();

function eventListener() {
  formProduct.addEventListener("submit", readForm);
}

function readForm(e) {
  e.preventDefault();
  const files = document.querySelector("[name=image]").files[0],
    nombre = document.querySelector("#nombre").value,
    language = document.querySelector("#language").value,
    descripcion = document.querySelector("#descripcion").value,
    precio = document.querySelector("#precio").value,
    stock = document.querySelector("#stock").value,
    oferta = document.querySelector("#oferta").value,
    category = document.querySelector("#selectCat").value,
    action = document.querySelector("#action").value;

  if (
    nombre === "" ||
    descripcion === "" ||
    precio === "" ||
    stock === "" ||
    selectCat === ""
  ) {
    mostrarNotificacion("Please enter the required fields !", "error");
  } else {
    const data = new FormData();
    data.append("img", files);
    data.append("nombre", nombre);
    data.append("language", language);
    data.append("descripcion", descripcion);
    data.append("precio", precio);
    data.append("stock", stock);
    data.append("oferta", oferta);
    data.append("category", category);
    data.append("action", action);
    if (action === "create") {
      createProduct(data);
    } else {
      //edit
      //leer el id
      const id_producto = document.querySelector("#id_product").value;
      data.append("id_producto", id_producto);
      editProduct(data);
    }
  }
}

//crate product
function createProduct(data) {
  //acrear objeto ajax
  const xhr = new XMLHttpRequest();
  //abrir conexion ajax
  xhr.open("POST", "http://localhost/sergio_magana/product/save", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const json = JSON.parse(xhr.responseText);
      //var contenido = document.getElementById('contenido');
      if (json.result == "true") {
        //notificacion
        mostrarNotificacion("Producto creado correctamente", "correcto");

        //reset form
        formProduct.reset();
      }
    }
  };
  xhr.send(data);
}

//editar producto
function editProduct(data) {
  //crear el objeto
  const xhr = new XMLHttpRequest();
  // abrir la conexion
  xhr.open("POST", "http://localhost/sergio_magana/product/save", true);
  // leer respuesta
  xhr.onload = function () {
    if (this.status === 200) {
      const json = JSON.parse(xhr.responseText);
      
      const image = document.querySelector("#img_course");
      if (image) {
        image.src = `http://localhost/sergio_magana/uploads/images/products/${json.id_imgen}`;
      }

      if (json.result === "true") {
        mostrarNotificacion("Producto modificado correctamente", "correcto");
      } else {
        mostrarNotificacion("Hubo un error", "error");
      }
    }
  };
  xhr.send(data);
}

function mostrarNotificacion(mensaje, clase) {
  const notificacion = document.createElement("div");
  notificacion.classList.add(clase, "notificacion", "sombra");
  notificacion.textContent = mensaje;

  //form
  formProduct.insertBefore(notificacion, document.querySelector("form legend"));

  //ocultar y mostrar la notificacion
  setTimeout(() => {
    notificacion.classList.add("visible");
    setTimeout(() => {
      notificacion.classList.remove("visible");
      setTimeout(() => {
        notificacion.remove();
      }, 500);
    }, 3000);
  }, 100);
}
