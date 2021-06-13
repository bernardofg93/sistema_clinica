const formCourse = document.querySelector("#formCourse"),
  listCourse = document.querySelector("#list tbody");

//eventos
eventListener();

function eventListener() {
  if (formCourse) {
    formCourse.addEventListener("submit", readForm);
  }
  if (listCourse) {
    listCourse.addEventListener("click", deleteElement);
  }
}

//se lee el formulario
function readForm(e) {
  e.preventDefault();

  //se leen valores del form
  const files = document.querySelector("[name=image]").files[0],
    name = document.querySelector("#name").value,
    description = document.querySelector("#description").value,
    price = document.querySelector("#price").value,
    ofert = document.querySelector("#ofert").value,
    id_idioma = document.querySelector("#language").value,
    action = document.querySelector("#action").value;

  //se verifica que vengan llenos los campos
  if (name === "" || price === "" || id_idioma === "") {
    mostrarNotificacion("Please enter the required fields !", "error");
  } else {
    //se crea el objeto data a enviar
    const data = new FormData();
    data.append("files", files);
    data.append("name", name);
    data.append("description", description);
    data.append("price", price);
    data.append("ofert", ofert);
    data.append("id_idioma", id_idioma);
    data.append("action", action);
    if (action === "create") {
      createCourse(data);
    } else {
      //edit
      //leer el id
      const course_id = document.querySelector("#course_id").value;
      data.append("course_id", course_id);
      editCourse(data);
    }

    //se condiciona
  }
}

function createCourse(data) {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", "http://localhost/sergio_magana/course/save", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      const json = JSON.parse(xhr.responseText);
      if (json.result === "true") {
        mostrarNotificacion("Sucefull", "correcto");
        formCourse.reset();
      }
    }
  };
  xhr.send(data);
}

function editCourse(data) {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", "http://localhost/sergio_magana/course/save", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      const json = JSON.parse(xhr.responseText);

      if (json.result === "true") {
        const name = document.querySelector("#name"),
          description = document.querySelector("#description"),
          price = document.querySelector("#price"),
          ofert = document.querySelector("#ofert"),
          language = document.querySelector("#language");

        name.value = json.name;
        description.value = json.description;
        price.value = json.price;
        ofert.value = json.ofert;
        language.value = json.language;

        if (json.img) {
          imgSrc = document.querySelector("#img_course");
          imgSrc.src = `http://localhost/sergio_magana/uploads/images/courses/${json.img}`;
        }
        mostrarNotificacion("Sucefull", "correcto");
      }
    }
  };
  xhr.send(data);
}

function deleteElement(e) {
  if (e.target.classList.contains("delete")) {
    const id = e.target.getAttribute("data-id");

    const result = confirm("Are you sure you want to delete ?");

    if (result) {
      const xhr = new XMLHttpRequest();

      xhr.open(
        "GET",
        `http://localhost/sergio_magana/course/delete&id=${id}`,
        true
      );

      xhr.onload = function () {
        if (xhr.status === 200) {
          const json = JSON.parse(xhr.responseText);

          if (json.result === "true") {
            e.target.parentElement.parentElement.remove();
          }
        }
      };
      xhr.send();
    }
  }
}

function mostrarNotificacion(mensaje, clase) {
  const notificacion = document.createElement("div");
  notificacion.classList.add(clase, "notificacion", "sombra");
  notificacion.textContent = mensaje;

  //form
  formCourse.insertBefore(notificacion, document.querySelector("form legend"));

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
