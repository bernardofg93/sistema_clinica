const action = document.querySelector('#action').value;
const fecha = document.querySelector('#fechaLlamada'),
    hora = document.querySelector('#horaLlamada'),
    cal = document.querySelector('#calLLamada'),
    segSelect = document.querySelector('#fechaSeg'),
    razonSelect = document.querySelector('#razon'),
    nombre = document.querySelector("#nombre"),
    correo = document.querySelector("#correo"),
    parentesco = document.querySelector('#parentesco'),
    consumo = document.querySelector('#consumo'),
    edad = document.querySelector('#edad'),
    acepta = document.querySelector('#acepta'),
    detalles = document.querySelector('#detalles'),
    medioEnvio = document.querySelector('#medioEnvio'),
    medioEntero = document.querySelector('#medioEntero'),
    fechaSeg = document.querySelector('#fechaSeg');
    //ladaTel = document.querySelector('#ladaTel');

fecha.disabled = true;
hora.disabled = true;

/*
if (razonSelect.value != 'Prospecto') {
    fecha.disabled = true;
    hora.disabled = true;
    cal.value = '';
    cal.disabled = true;
    segSelect.value = '';
    segSelect.disabled = true;
    nombre.value = "";
    nombre.disabled = true;
    correo.value = '';
    correo.disabled = true;
    parentesco.value = '';
    parentesco.disabled = true;
    edad.value = '';
    edad.disabled = true;
    acepta.value = '';
    acepta.disabled = true;
    detalles.value = '';
    detalles.disabled = true;
    medioEnvio.value = '';
    medioEnvio.disabled = true;
    medioEntero.value = '';
    medioEntero.disabled = true;
    fechaSeg.value = '';
    fechaSeg.disabled = true;
} else {
    document.querySelector("#nombre").disabled = false;
    document.querySelector("#correo").disabled = false;
    document.querySelector('#parentesco').disabled = false;
    document.querySelector('#consumo').disabled = false;
    document.querySelector('#edad').disabled = false;
    document.querySelector('#acepta').disabled = false;
    document.querySelector('#detalles').disabled = false;
    document.querySelector('#medioEnvio').disabled = false;
    document.querySelector('#medioEntero').disabled = false;
    document.querySelector('#fechaSeg').disabled = false;
}
 */

eventListener();

function eventListener() {
    if (cal) {
        cal.addEventListener('change', readCal);
    }
    if (razonSelect) {
        razonSelect.addEventListener('change', actionRazonLlamada);
    }
    if (segSelect) {
        segSelect.addEventListener('change', actionFechaSeguimiento);
    }
}

if (action === 'create') {
    //hora de la llamada
    const horaInput = document.querySelector("#horaLlamada");
    let typeHour;
    let date = new Date();
    hours = date.getHours();
    min = date.getMinutes();
    seconds = date.getSeconds();
    hours < 10 ? hours = 0 + hours : hours;
    min < 10 ? min = '0' + min : min;
    if (seconds < 10) seconds = '0' + seconds;
    hours >= 12 ? typeHour = 'PM' : typeHour = 'AM';
    let hour = hours + ":" + min + ":" + seconds + ":" + typeHour;
    horaInput.value = hour;

    //fecha de la llamada
    const fechaInput = document.querySelector("#fechaLlamada");
    let dataFecha = new Date();
    let month = dataFecha.getMonth() + 1;
    month < 10 ? month = '0' + month : month;
    let days = dataFecha.getDate();
    days < 10 ? days = '0' + days : days;
    let year = dataFecha.getFullYear();
    let fechaNow = days + "/" + month + "/" + year;
    fechaInput.value = fechaNow;
} else {
    //si esta en modo editar se bloquean los campos de fecha y hora
    fecha.disabled = true;
    hora.disabled = true;
}

//calificacion llamada
function readCal(e) {
    let idCal = e.target.value;
    if (idCal === '1') {
        segSelect.disabled = true;
    } else {
        segSelect.disabled = false;
    }
}

//Funcionalidad del formulario con las acciones de l select razon de llamada
function actionRazonLlamada(e) {
    let calLLamada = document.querySelector('#calLLamada');
    let action = e.target.value;
    if (action === 'Prospecto') {
        cal.value = '';
        cal.disabled = false;
        segSelect.value = '';
        segSelect.disabled = false;
        nombre.value = "";
        nombre.disabled = false;
        correo.value = '';
        correo.disabled = false;
        parentesco.value = '';
        parentesco.disabled = false;
        edad.value = '';
        edad.disabled = false;
        acepta.value = '';
        acepta.disabled = false;
        detalles.value = '';
        detalles.disabled = false;
        medioEnvio.value = '';
        medioEnvio.disabled = false;
        medioEntero.value = '';
        medioEntero.disabled = false;
        fechaSeg.value = '';
        fechaSeg.disabled = false;
        calLLamada.disabled = false;

        if (calLLamada.value === '1') {
            segSelect.disabled = true;
        }
    } else {
        calLLamada.value = '1';
        calLLamada.disabled = true;
        cal.value = '';
        cal.disabled = true;
        segSelect.value = '';
        segSelect.disabled = true;
        nombre.value = "";
        nombre.disabled = true;
        correo.value = '';
        correo.disabled = true;
        parentesco.value = '';
        parentesco.disabled = true;
        edad.value = '';
        edad.disabled = true;
        acepta.value = '';
        acepta.disabled = true;
        detalles.value = '';
        detalles.disabled = true;
        medioEnvio.value = '';
        medioEnvio.disabled = true;
        medioEntero.value = '';
        medioEntero.disabled = true;
        fechaSeg.value = '';
        fechaSeg.disabled = true;
    }
}

//fecha seguimiento
function actionFechaSeguimiento(e) {
    let dataFecha = new Date();
    let month = dataFecha.getMonth() + 1;
    let days = dataFecha.getDate();
    let year = dataFecha.getFullYear();
    //yaer
    let f = this.value;
    let valYear = f.slice(0, -6);
    if (valYear < year && valYear != '') {
        segSelect.value = "";
        sweetAlert('La fecha no puede ser menor a la actual', 'error');
    }
    //month
    let m = this.value;
    let valMonth = m.slice(5, -3);
    valMonth < 10 ? valMonth = m.slice(6, -3) : valMonth;
    if (valMonth < month && valYear != '') {
        segSelect.value = "";
        sweetAlert('La fecha no puede ser menor a la actual', 'error');
    }
    //day
    let d = this.value;
    let valDay = d.slice(8);
    valDay < 10 ? valDay = d.slice(9) : valDay;
    if (valDay <= days && valYear != '') {
        segSelect.value = "";
        sweetAlert('La fecha no puede ser menor a la actual', 'error');
    }
}

/* Quitar espacios s textareas */
detalles.value.replace(" ", "");

/* leer al momento de cargar */
document.addEventListener('DOMContentLoaded', function () {
    const ventaId = document.querySelector('#ventaId').value;

    const xhr = new XMLHttpRequest();

    xhr.open('GET', `${GLOBAL_URL}/venta/validatePacienteVenta&id=${ventaId}`, true)

    xhr.onload = function () {
        if(this.status === 200){
            const res = JSON.parse(xhr.responseText);
            if(res.id_ingreso_paciente){
                fechaSeg.disabled = true;
                calLLamada.disabled = true;
            }
        }
    }
    xhr.send();
})


// Telefono && whatsapp //

