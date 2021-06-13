$(function () {
    $('.select2').select2()
});

$('.select2').change(function (e) {
    if (e.target.classList.contains('select2')) {

        const res = confirm('Deseas asignar el usuario');

        if (res) {
            const rol = $('#rol').val();
            //const id_us = $('#usuario_id').val();
            const id_pac = $('#paciente_id').val();


            $.ajax({
                url: 'http://localhost/clinica_soft/asignacionPaciente/insert',
                type: 'POST',
                dataType: 'json',
                data: {
                    rol,
                    id_pac
                }
            }).done(
                function (data) {
                    if (data.result === 'true') {
                        sweetAlert('Paciente asignado', 'success');
                        $('#ajax-data').append(data.nombre);
                    } else {
                        sweetAlert('El paciente ya ah sido asignado', 'error');
                    }
                }
            );
        }
    }
});


