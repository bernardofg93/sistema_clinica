const contactosForm = document.querySelector('#cpForm');
const btnCreate = document.querySelector('#btnCreate');

eventListener();

function eventListener() {
    if(contactosForm){
        contactosForm.addEventListener('submit', readForm);
    }
    if(btnCreate) {
        btnCreate.addEventListener('click', create);
    }
}

function readForm(e) {
    e.preventDefault();

    const nombre = document.querySelector('#nombreCp').value,
        telefono = document.querySelector('#telCp').value,
        correo = document.querySelector('#correoCp').value,
        parentesco = document.querySelector('#parentescoCp').value;

    /*
    paciente_id = document.querySelector('#paciente_id').value,
    ingreso_id = document.querySelector('#ingreso_id').value;
    action = document.querySelector('#create').value;
    console.log(nombre);
    const data = new FormData();
    data.append('nombre', nombre);
    data.append('telefono', telefono);
    data.append('correo', correo);
    data.append('parentesco', parentesco);
    data.append('paciente_id', paciente_id);
    data.append('ingreso_id', ingreso_id);
    data.append('action', action);

   if(action === 'create') {
        sendDb(data);
    }
    */
    const $tbody = document.querySelector('#contactosPaciente');
    const $tr = document.createElement('tr');

    const $tdNombre = document.createElement('td');
    $tdNombre.setAttribute('class', 'nombre-cp');
    $tdNombre.innerText = nombre;
    $tr.appendChild($tdNombre);

    const $tdTel = document.createElement('td');
    $tdTel.setAttribute('class', 'tel-cp');
    $tdTel.innerText = telefono;
    $tr.appendChild($tdTel);

    const $tdContacto = document.createElement('td');
    $tdContacto.setAttribute('class', 'contacto-cp');
    $tdContacto.innerText = correo;
    $tr.appendChild($tdContacto);

    const $tdParentesco = document.createElement('td');
    $tdParentesco.setAttribute('class', 'parentesco-cp');
    $tdParentesco.innerText = parentesco;
    $tr.appendChild($tdParentesco);

    $tbody.appendChild($tr);

}

function create() {
    /*
    const action = document.querySelector('#actionContact');
    action.value = '';
    action.value = 'create';
    */
}

/*
function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/clinica_soft/contactosPaciente/save', true);

    xhr.onload = function (){
        if(this.status === 200){
            const response = JSON.parse(xhr.responseText);
            if(response.res === 'true'){
                console.log(response);
            }
        }
    }
    xhr.send(data);
}
*/