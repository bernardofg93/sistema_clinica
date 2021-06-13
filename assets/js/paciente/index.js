const formPaciente = document.querySelector('#rgPaciente'),
    listUsers = document.querySelector('#list tbody'),
    stateUs = document.querySelector('#card-body .card-body'),
    fecha = document.querySelector('#fecha_nac'),
    selectRecomendacion = document.querySelector('#se_entrero'),
    selectTratamiento = document.querySelector('#tratamiento');

const mgError = 'Favor de llenar los campos requeridos',
    resError = 'error',
    mgTrue = 'Generado correctamente',
    resTrue = 'success';

eventListener();

function eventListener() {
    if (formPaciente) {
        formPaciente.addEventListener('submit', readForm);
    }
    if (listUsers) {
        listUsers.addEventListener('click', readListUsers);
    }
    if (stateUs) {
        stateUs.addEventListener('change', stateUsers);
    }
    if (fecha) {
        fecha.addEventListener('change', getFecha);
    }
    if (selectRecomendacion) {
        selectRecomendacion.addEventListener('change', gestionSelectRecomendacion);
    }
    if (selectTratamiento) {
        selectTratamiento.addEventListener('change', gestionSelectTratamiento);
    }
}

// Gestion via select tratamiento a campo duracion
function gestionSelectTratamiento(e) {
    const parentTxt = document.querySelector('#cont-duracion');
    const divNode = document.querySelector('#txt-bx');

    // se crean los elementos a insertar en el dom
    const $label = document.createElement('label');
    $label.setAttribute("id", 'cont-duracion');
    divNode.appendChild($label);

    let valor = e.target.value;

    if (valor === 'CAP1' || valor === 'CAP2') {
        //se elimina el nodo padre
        divNode.removeChild(parentTxt);

        // Se inserta el hijo en el padre eliminado
        $label.insertAdjacentText('beforeend', 'Semanas');
    } else {
        divNode.removeChild(parentTxt);
        // Se inserta el hijo en el padre eliminado
        $label.insertAdjacentText('beforeend', 'Meses');
    }
}

// habilitar campo seleccionable
function gestionSelectRecomendacion(e) {
    const inputRecomendado = document.querySelector('#recomendado');
    let valor = e.target.value;
    if (valor === 'Recomendación') {
        inputRecomendado.disabled = false;
    } else {
        inputRecomendado.disabled = true;
        inputRecomendado.value = '';
    }
}

// Calcular fecha con input type date
function getFecha(e) {
    let myDate = e.target.value;
    let fechanac = new Date(myDate);
    let ahora = new Date();
    let agnios = ahora.getFullYear() - fechanac.getFullYear();
    let edad = document.querySelector('#edad');
    edad.value = agnios;
}

//asignar fecha al momento de reingresar
let mydate = fecha.value;
if (mydate) {
    let fechaNac = new Date(mydate);
    let nowDate = new Date();
    let edad = nowDate.getFullYear() - fechaNac.getFullYear();
    let txtEdad = document.querySelector('#edad');
    txtEdad.value = edad;
}

//Se lee el formalrio y se delimita si se va editar o crear el usuario 
function readForm(e) {
    e.preventDefault();

    // paciente
    const nombre = document.querySelector('#nombre').value,
        apellido_p = document.querySelector('#apellido_p').value,
        apellido_m = document.querySelector('#apellido_m').value,
        fecha_nac = document.querySelector('#fecha_nac').value,
        lugar_nac = document.querySelector('#lugar_nac').value;
    //ingreso paciente
    const edad = document.querySelector('#edad').value,
        civil = document.querySelector('#civil').value,
        hijos = document.querySelector('#hijos').value,
        edades = document.querySelector('#edades').value,
        ocupacion = document.querySelector('#ocupacion').value,
        vive_con = document.querySelector('#vive_con').value,
        calle = document.querySelector('#calle').value,
        ext = document.querySelector('#ext').value,
        interior = document.querySelector('#interior').value,
        colonia = document.querySelector('#colonia').value,
        ciudad = document.querySelector('#ciudad').value,
        cp = document.querySelector('#cp').value,
        estado_vive = document.querySelector('#estado_vive').value,
        pais = document.querySelector('#pais').value,
        se_entrero = document.querySelector('#se_entrero').value,
        recomendado = document.querySelector('#recomendado').value,
        resp = document.querySelector('#resp').value,
        actitud = document.querySelector('#actitud').value,
        observaciones = document.querySelector('#observaciones').value,
        estado_civil = document.querySelector('#civil').value,
        adiccion = document.querySelector('#adiccion').value,
        tratamiento = document.querySelector('#tratamiento').value,
        ingreso = document.querySelector('#ingreso').value,
        precio_trat = document.querySelector('#precio_trat').value,
        precio_letra = document.querySelector('#precio_letra').value,
        moneda = document.querySelector('#moneda').value,
        duracion = document.querySelector('#duracion').value,
        deposito_ip = document.querySelector('#deposito_ip').value,
        deposito_letra = document.querySelector('#deposito_letra').value,
        forma_pago = document.querySelector('#forma_pago').value,
        action = document.querySelector('#action').value;

    let dataCp = [];

    document.querySelectorAll('.table-bordered tbody tr').forEach(function (e){
        let dataTable = {
            nombreCp: e.querySelector('.nombre-cp').innerText,
            telCp: e.querySelector('.tel-cp').innerText,
            correoCp: e.querySelector('.contacto-cp').innerText,
            parentescoCp: e.querySelector('.parentesco-cp').innerText
        };
        dataCp.push(dataTable);
    });

    //Se convierte el arreglo en json
    let arrData = JSON.stringify(dataCp);

    const data = new FormData();
    data.append("nombre", nombre);
    data.append("apellido_p", apellido_p);
    data.append("apellido_m", apellido_m);
    data.append("fecha_nac", fecha_nac);
    data.append("lugar_nac", lugar_nac);
    data.append("action", action);

    data.append("edad", edad);
    data.append("civil", civil);
    data.append("hijos", hijos);
    data.append("edades", edades);
    data.append("ocupacion", ocupacion);
    data.append("vive_con", vive_con);
    data.append("calle", calle);
    data.append("ext", ext);
    data.append("interior", interior);
    data.append("colonia", colonia);
    data.append("ciudad", ciudad);
    data.append("cp", cp);

    data.append("estado_vive", estado_vive);
    data.append("pais", pais);
    data.append("se_entrero", se_entrero);
    data.append("adiccion", adiccion);
    data.append("recomendado", recomendado);
    data.append("resp", resp);
    data.append("vive_con", vive_con);
    data.append("actitud", actitud);
    data.append("observaciones", observaciones);
    data.append("arrData", arrData);

    data.append("estado_civil", estado_civil);
    data.append("tratamiento", tratamiento);
    data.append("ingreso", ingreso);
    data.append("precio_trat", precio_trat);
    data.append("precio_letra", precio_letra);
    data.append("moneda", moneda);
    data.append("duracion", duracion);
    data.append("deposito_ip", deposito_ip);
    data.append("deposito_letra", deposito_letra);
    data.append("forma_pago", forma_pago);

    console.log(...data);

    if (nombre === '' || apellido_p === '' || apellido_m === '' || fecha_nac === '' || lugar_nac === '') {

        sweetAlert(mgError, resError);

    } else if (action === 'create') {
        sendDb(data);
    } else if (action === 'reingreso') {
        const paciente_id = document.querySelector('#paciente_id').value;
        data.append('paciente_id', paciente_id);
        sendDb(data);
    } else {
        const paciente_id = document.querySelector('#paciente_id').value;
        data.append("paciente_id", paciente_id);
        editData(data);
    }
}

// Se detecta el click en cualquier accion de la tabla usuario
function readListUsers(e) {
    //eliminar usuario
    if (e.target.classList.contains('delete_us')) {
        id = e.target.getAttribute('data-id');
        console.log(e.target.parentElement.parentElement);

        const respuesta = confirm('¿ Estas seguro de eliminar al usuario ?');

        if (respuesta) {
            const xhr = new XMLHttpRequest();

            xhr.open('GET', `http://localhost/clinica_soft/usuario/delete&id=${id}`, true)

            xhr.onload = function () {
                const rs = JSON.parse(xhr.responseText);

                if (rs.result === 'success') {
                    e.target.parentElement.parentElement.remove();
                }
            }
            xhr.send();
        }
    }
}

// se crea el usuario
function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/clinica_soft/paciente/save', true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.res === 'true') {
                sweetAlert('Generado Correctamente', 'success');
                formPaciente.reset();

                //Generar Boton PDF
                const $button = document.createElement('a');
                $button.setAttribute('class', 'btn btn-danger btn-flat');
                $button.href = `http://localhost/clinica_soft/docs/contrato_ingreso_esp.php?&idP=${response.paciente_id}&idI=${response.ingreso_id}`;
                $button.setAttribute('target', '_blank');

                //Icon Pdf
                const $icon = document.createElement('i');
                $icon.setAttribute('class', 'fas fa-file-pdf');

                //Agregar icono al boton
                $button.appendChild($icon);

                //Agregar a su contenedor
                const containerButtons = document.querySelector('#container-buttons');
                containerButtons.appendChild($button);
                console.log($button);
            }
        }
    }
    xhr.send(data)
}

// se edita el usuario
function editData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/clinica_soft/usuario/save');

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.result === 'true') {
                alert('El usuario se edito correctamente');
            }
        }
    }
    xhr.send(data)
}

// funcion para cambiar el pass del usuario 
function readPass(e) {
    e.preventDefault();

    const pass = document.querySelector('#pass').value,
        newpass = document.querySelector('#newpass').value,
        idUser = document.querySelector('#idUser').value;

    const data = new FormData();
    data.append("pass", pass);
    data.append("newpass", newpass);
    data.append("idUser", idUser);

    if (pass === '' || newpass === '') {
        alert('Todos los Campos son Obligatorios');
    } else if (pass != newpass) {
        alert('Las controaseñas no coinciden');
    } else {
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "http://localhost/clinica_soft/usuario/changePassword", true);

        xhr.onload = function () {
            if (this.status === 200) {
                const result = JSON.parse(xhr.responseText);
                if (result.result === 'true') {
                    alert('Contraseña actualizada correctamente');
                }
            }
        }
        xhr.send(data);
    }
}

// Funcion para cambiar el estado del usuario si esta activo o inactivo
function stateUsers(e) {
    const state = (e.target);
    const id = (e.target.getAttribute('data-v'));

    if (!state.checked) {
        const res = confirm('¿ Estas seguro que deseas inabilitarlo ?');

        if (res) {
            const xhr = new XMLHttpRequest();

            const status = 'Inactivo';

            const data = new FormData();
            data.append('status', status);
            data.append('id', id);

            xhr.open("POST", "http://localhost/clinica_soft/usuario/estado", true);

            xhr.onload = function () {
                if (this.status === 200) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.result === 'true') {
                        const status_input = document.querySelector('#estado_us');
                        status_input.value = result.status;
                    }
                }
            }
            xhr.send(data);
        }
    } else {
        const res = confirm('¿ Estas seguro que deseas habilitarlo ?');
        if (res) {
            const xhr = new XMLHttpRequest();

            const status = 'Activo';

            const data = new FormData();
            data.append('status', status);
            data.append('id', id);

            xhr.open("POST", "http://localhost/clinica_soft/usuario/estado", true);

            xhr.onload = function () {
                if (this.status === 200) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.result === 'true') {
                        const status_input = document.querySelector('#estado_us');
                        status_input.value = result.status;
                    }
                }
            }
            xhr.send(data);
        }
    }
}








