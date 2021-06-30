const formVenta = document.querySelector("#rgVenta");

eventListener();

function eventListener() {
    if (formVenta) {
        formVenta.addEventListener('submit', readForm);
    }
}

function readForm(e) {
    e.preventDefault();
    const ladaTel = document.querySelector("#ladaTel").value,
        razonLlamada = document.querySelector("#razon").value,
        nombre = document.querySelector("#nombre").value,
        correo = document.querySelector("#correo").value,
        parentesco = document.querySelector('#parentesco').value,
        consumo = document.querySelector('#consumo').value,
        edad = document.querySelector('#edad').value,
        aceptada = document.querySelector('#acepta').value,
        detalles = document.querySelector('#detalles').value,
        medioEnvio = document.querySelector('#medioEnvio').value,
        medioEntero = document.querySelector('#medioEntero').value,
        fechaSeg = document.querySelector('#fechaSeg').value,
        action = document.querySelector('#action').value;

    const data = new FormData();
    data.append('ladaTel', ladaTel);
    data.append('razonLlamada', razonLlamada);
    data.append('nombre', nombre);
    data.append('correo', correo);
    data.append('parentesco', parentesco);
    data.append('consumo', consumo);
    data.append('edad', edad);
    data.append('aceptada', aceptada);
    data.append('detalles', detalles);
    data.append('medioEnvio', medioEnvio);
    data.append('medioEntero', medioEntero);
    data.append('fechaSeg', fechaSeg);
    data.append('action', action);

    console.log(...data);

    if (action === 'create') {
        const nota = document.querySelector('#nota').value;
        data.append('nota', nota);
        sendDb(data);
    } else {
        const ventaId = document.querySelector('#ventaId').value;
        data.append('ventaId', ventaId);
        editDb(data);
    }
}

//crear
function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/clinica_soft/venta/save', true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            response.res === 'true' ? sweetAlert('Generado correctamente', 'success') : null;
        }
    }

    xhr.send(data);
}

//editar
function editDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/clinica_soft/venta/save', true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);
            response.res === 'true' ? sweetAlert('Generado correctamente', 'success') : null;
        }
    }
    xhr.send(data);
}