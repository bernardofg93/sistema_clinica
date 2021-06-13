const formVideo = document.querySelector('#formVideo'),
    detectFormVideo = document.querySelector('#list tbody');

const d = document,
    $main = d.querySelector('main');

const $span = d.createElement("span");

//eventos 
eventListener();

function eventListener() {

    if (formVideo) {
        formVideo.addEventListener('submit', readForm);
    }
    if (detectFormVideo) {
        detectFormVideo.addEventListener('click', deleteElement);
    }
}

//se lee el formulario
function readForm(e) {
    e.preventDefault();

    //se leen valores del form
    const fileVideo = document.querySelector('[name=video]').files[0],
        filesImg = document.querySelector('[name=img]').files[0],
        name = document.querySelector('#name').value,
        description = document.querySelector('#description').value,
        id_language = document.querySelector('#language').value,
        course_id = document.querySelector('#course_id').value,
        action = document.querySelector('#action').value;

    //se verifica que vengan llenos los campos
    if (name === '' || description === '' || id_language === '' || filesImg === '') {
        mostrarNotificacion('Please enter the required fields !', 'error');
    } else {

        //se crea el objeto data a enviar
        const data = new FormData();
        data.append('filesImg', filesImg);
        data.append('name', name);
        data.append('description', description);
        data.append('id_language', id_language);
        data.append('course_id', course_id);
        data.append('action', action);

        // si existe el video se manda la data a la base de datos
        if (fileVideo) {
            const $progress = d.createElement("progress");
            $progress.value = 0;
            $progress.max = 100;

            $main.insertAdjacentElement('beforeend', $progress);
            $main.insertAdjacentElement('beforeend', $span);

            const fileReader = new FileReader();

            fileReader.readAsDataURL(fileVideo);

            fileReader.addEventListener('progress', e => {
                //console.log(e);
                let progress = parseInt((e.loaded * 100) / e.total);
                $progress.value = progress;
                $span.innerHTML = `<b>${data.name} - ${progress}%</b>`;
            });

            //evento que se ejecuta al finalzar de cargar un archivo
            fileReader.onloadend = function () {
                data.append('fileVideo', fileVideo);

                //si todos los campos vienen completos se manda la data y se crea un nuevo video
                if (action === 'create') {
                    uploadVideo(data);
                } else if (action === 'edit') {
                    //se edita la data del video si viene el link con data
                    video_id = document.querySelector('#video_id').value;
                    data.append('video_id', video_id);
                    editVideo(data);
                }

                setTimeout(() => {
                    $main.removeChild($progress);
                    $main.removeChild($span);
                    //$files.value = '';
                }, 3000);
            }
        } else {
            //se actualiza la data del video si no viene con data el link del video 
            if (action === 'edit') {
                video_id = document.querySelector('#video_id').value;
                data.append('video_id', video_id);
                editVideo(data);
            }
        }
    }
}

function deleteElement(e) {
    if (e.target.classList.contains('borrar')) {
        const id = e.target.getAttribute('data-id');

        const respuesta = confirm('Are you sure you want to delete');
        if (respuesta) {
            const xhr = new XMLHttpRequest();

            xhr.open('GET', `http://localhost/sergio_magana/video/delete&id=${id}`, true);

            xhr.onload = function () {
                if (this.status === 200) {
                    const json = JSON.parse(xhr.responseText);
                    if (json.result === 'true') {
                        e.target.parentElement.parentElement.remove();
                    }
                }
            }
            xhr.send();
        }
    }
}

function uploadVideo(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', "http://localhost/sergio_magana/video/save", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const json = JSON.parse(xhr.responseText);
            if (json.result === 'true') {
                mostrarNotificacion('Sucefful', 'correcto');
            }
        }
    }
    xhr.send(data);
}

function editVideo(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', "http://localhost/sergio_magana/video/save", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const json = JSON.parse(xhr.responseText);

            if (json.result === 'true') {
                const name = document.querySelector('#name'),
                    description = document.querySelector('#description'),
                    language = document.querySelector('#language'),
                    txtVideo = document.querySelector('#txt-link');

                    if(json.img){
                        image = document.querySelector('#img_upload');
                        image.src = `http://localhost/sergio_magana/uploads/images/videos/${json.img}`;
                    }
                
                name.value = json.name;
                description.value = json.description;
                language.value = json.language;
                txtVideo.innerHTML = `${json.link}`;

                mostrarNotificacion('Sucefful', 'correcto');
            }
        }
    }
    xhr.send(data);
}

function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    //form
    formVideo.insertBefore(notificacion, document.querySelector('form legend'));

    //ocultar y mostrar la notificacion
    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500)
        }, 3000);
    }, 100);
}
