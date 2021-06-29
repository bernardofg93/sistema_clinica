<?php $action = Utils::validate(isset($data) && is_object($data) ? $data : '') ?>

<?php isset($data) && is_object($data) ? $id = $_GET['id'] : '' ?>

<?php if (isset($reingreso) && $reingreso) : ?>
    <?php $action = 'reingreso'; ?>
<?php endif; ?>

<!-- Formulario -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?= isset($ident) && is_object($ident) ? '<h4>Proceso de ventas</h4>' : '<h4>Proceso de ventas</h4>' ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>ventas/index">Ventas</a>
                </li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<!-- Buttons -->
<div class="card card-white col-sm-6">
    <div class="card-body" id="container-buttons">
        <button type="submit" form="rgPaciente" class="btn btn-cns btn-flat">
            <i class="far fa-save"></i>
        </button>
        <a type="button" id="btnCreate" class="btn btn-cns btn-flat" data-toggle="modal" data-target="#modalCategory">
            <i class="far fa-list-alt"></i>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <form id="rgPaciente">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="nombre">Fecha de llamada:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="nombre" value="<?= isset($ident) && is_object($ident) ? $ident->nombre_pa : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellido_p">Hora de llamada:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="apellido_p" value="<?= isset($ident) && is_object($ident) ? $ident->apellido_paterno_pa : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="apellido_m">Lada + Telefono:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="apellido_m" value="<?= isset($ident) && is_object($ident) ? $ident->apellido_materno_pa : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Razon de llamada:</label>
                                <select class="form-control form-control-sm" id="adiccion">
                                    <option value="<?= isset($edit) && is_object($edit) ? $edit->adiccion_ip : '' ?>" disabled selected><?= isset($edit) && is_object($edit) ? $edit->adiccion_ip : 'Selecciona'; ?></option>
                                    <option value="Prospecto">Prospecto</option>
                                    <option value="Cobrar algún servicio o producto">Cobrar algún servicio o producto</option>
                                    <option value="Busca Empleo o Recursos Humanos">Busca Empleo o Recursos Humanos</option>
                                    <option value="Quiere hablar con paciente activo">Quiere hablar con paciente activo</option>
                                    <option value="Busca persona perdida o saber si aqui esta">Busca persona perdida o saber si aqui esta</option>
                                    <option value="Proveedor">Proveedor</option>
                                    <option value="Otro">Otro</option>
                                    <option value="Busca Empleado">Busca Empleado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lugar_nac">Nombre contacto:</label>
                                <input type="text" class="form-control form-control-sm" id="lugar_nac" value="<?= isset($ident) && is_object($ident) ? $ident->lugar_nacimiento_pa : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Correo de contacto:</label>
                                <input type="text" class="form-control form-control-sm" id="ocupacion" value="<?= isset($edit) && is_object($edit) ? $edit->ocupacion_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Parentesco:</label>
                                <input type="text" class="form-control form-control-sm" id="ocupacion" value="<?= isset($edit) && is_object($edit) ? $edit->ocupacion_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Tipo de consumo:</label>
                                <input type="text" class="form-control form-control-sm" id="ocupacion" value="<?= isset($edit) && is_object($edit) ? $edit->ocupacion_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Edad:</label>
                                <input type="text" class="form-control form-control-sm" id="ocupacion" value="<?= isset($edit) && is_object($edit) ? $edit->ocupacion_ip : '' ?>">
                            </div>
                        </div>
                    </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="resp">Detalles adicionales:</label>
                            <textarea class="form-control form-control-sm" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="actitud">Por que medio se envio:</label>
                            <input type="text" class="form-control form-control-sm" id="actitud" value="<?= isset($edit) && is_object($edit) ? $edit->estado_actitud : '' ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Medio por el cual se entero:</label>
                            <select class="form-control form-control-sm" id="adiccion">
                                <option value="<?= isset($edit) && is_object($edit) ? $edit->adiccion_ip : '' ?>" disabled selected><?= isset($edit) && is_object($edit) ? $edit->adiccion_ip : 'Selecciona'; ?></option>
                                <option value="Prospecto">Prospecto</option>
                                <option value="Internet">Internet</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Radio">Radio</option>
                                <option value="Recomendación">Recomendación</option>
                                <option value="Reingreso">Reingreso</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="actitud">Fecha de seguimiento:</label>
                            <input type="text" class="form-control form-control-sm" id="actitud" value="<?= isset($edit) && is_object($edit) ? $edit->estado_actitud : '' ?>" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.table -->
    <?php include "admin/layout/footer.php" ?>
    <script src="<?= base_url ?>assets/js/alerts.js"></script>
    <script src="<?= base_url ?>assets/js/paciente/index.js"></script>
    <script src="<?= base_url ?>assets/js/paciente/contactos.js"></script>
    <script src="<?= base_url ?>admin/assets/js/table.js"></script>