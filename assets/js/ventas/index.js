
//hora de la llamada
const horaInput = document.querySelector("#horaLlamada");
let typeHour
let date = new Date();
hours = date.getHours();
min = date.getMinutes();
seconds = date.getSeconds();
hours < 10 ? hours = 0 + hours : hours;
min < 10 ? min = '0' + min : min ;
if(seconds < 10) seconds = '0' + seconds;
hours >= 12 ? typeHour = 'PM' : typeHour = 'AM';
let hour = hours+":"+min+":"+seconds+":"+typeHour;
horaInput.value = hour;

//fecha de la llamada
const fechaInput = document.querySelector("#fechaLlamada");
let dataFecha = new Date();
let month = dataFecha.getMonth()
month < 10 ? month = '0' + month : month;
let days = dataFecha.getDay();
days < 10 ? days = '0' + days : days;
let year = dataFecha.getFullYear();
let fecha = days+":"+month+":"+year;
fechaInput.value = fecha;
