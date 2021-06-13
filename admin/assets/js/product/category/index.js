const categoryProduct = document.querySelector("#categoryProduct"),
  getIdCat = document.querySelector("#list tbody");

function btnCreateCat() {
  document.querySelector("form").reset();
  const action = document.querySelector("#action");
  action.value = "create";
}

eventListener();

function eventListener() {
  categoryProduct.addEventListener("submit", readModal);
  getIdCat.addEventListener("click", readId);
}

function readId(e) {
  if (e.target.classList.contains("edit-cat")) {
    const id = e.target.getAttribute("data-id");

    const xhr = new XMLHttpRequest();

    xhr.open(
      "GET",
      `http://localhost/sergio_magana/categoryProd/edit&id=${id}`,
      true
    );

    xhr.onload = function () {
      if (xhr.status === 200) {
        const result = JSON.parse(xhr.responseText);

        const nameCategory = document.querySelector("#nombre_cat_productos"),
          action = document.querySelector("#action"),
          categoryId = document.querySelector("#category_id");

        nameCategory.value = result.nombre;
        action.value = "edit";
        categoryId.value = result.id;
      }
    };
    xhr.send();
  }

  if (e.target.classList.contains("bg-gradient-danger")) {
    //obtengo el id
    const id = e.target.getAttribute("data-id");

    //preguntar al usuario
    const resultUser = confirm("Are you sure you want to delete");

    if (resultUser) {
      const xhr = new XMLHttpRequest();

      // abrir la conexión
      xhr.open(
        "GET",
        `http://localhost/sergio_magana/categoryProd/delete&id=${id}`,
        true
      );

      xhr.onload = function () {
        if (this.status === 200) {
          const response = JSON.parse(xhr.responseText);

          if (response.result === "true") {
            //console.log(e.target.parentElement);
            e.target.parentElement.parentElement.remove();
          }
        }
      };
      xhr.send();
    }
  }
}

function readModal(e) {   
  e.preventDefault();
  const name = document.querySelector("#nombre_cat_productos").value;
  const action = document.querySelector("#action").value;

  if (name === "") {
    mostrarNotificacion("Error", "error");
  } else {
    const data = new FormData();
    data.append("name", name);
    data.append("action", action);

    if (action == "create") {
      createCategory(data);
    } else {
      const category_id = document.querySelector("#category_id").value;
      data.append("category_id", category_id);
      console.log(...data);
      editCategory(data);
    }
  }
}

function createCategory(data) {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", "http://localhost/sergio_magana/categoryProd/save", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);

      if (response.result === "true") {
        mostrarNotificacion("Sucefful", "correcto");
        //console.log(response.id);
        //insertar elemento a la tabla
        const newCategory = document.createElement("tr");

        newCategory.innerHTML = `
                <td>${response.nombre}</td>
               `;

        getIdCat.appendChild(newCategory);

        //contenedor boton editar
        const tdBotonEdit = document.createElement("td");
        tdBotonEdit.classList.add("col-1");

        const btnEditar = document.createElement("button");
        btnEditar.setAttribute("data-id", response.id);
        btnEditar.setAttribute("data-toggle", "modal");
        btnEditar.setAttribute("data-target", "#modalCategory");
        btnEditar.classList.add(
          "btn",
          "btn-block",
          "bg-gradient-info",
          "btn-xs",
          "edit-cat"
        );
        btnEditar.innerText = "EDIT";

        //contenedor boton editar
        const tdBotonDelete = document.createElement("td");
        tdBotonDelete.classList.add("col-1");

        const btnDelete = document.createElement("button");
        btnDelete.setAttribute("data-id", response.id);
        btnDelete.setAttribute("data-toggle", "modal");
        btnDelete.setAttribute("data-target", "modalCategory");
        btnDelete.classList.add(
          "btn",
          "btn-block",
          "bg-gradient-danger",
          "borrar",
          "btn-xs"
        );
        btnDelete.innerText = "DELETE";

        //agregarlos al padre
        tdBotonEdit.appendChild(btnEditar);
        newCategory.appendChild(tdBotonEdit);

        //agregarlos al padre
        tdBotonDelete.appendChild(btnDelete);
        newCategory.appendChild(tdBotonDelete);

        categoryProduct.reset();
      } else {
        mostrarNotificacion("Error", "false");
      }
    }
  };
  xhr.send(data);
}

function editCategory(data) {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", "http://localhost/sergio_magana/categoryProd/save", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);

      if (response.result === "true") {
        mostrarNotificacion("Sucefful", "correcto");
        location.reload();
      }
    }
  };
  xhr.send(data);
}

// Notifación en pantalla
function mostrarNotificacion(mensaje, clase) {
  const notificacion = document.createElement("div");
  notificacion.classList.add(clase, "notificacion", "sombra");
  notificacion.textContent = mensaje;

  // formulario
  categoryProduct.insertBefore(notificacion, document.querySelector("legend"));

  // Ocultar y Mostrar la notificacion
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
