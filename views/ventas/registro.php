<?php $action = Utils::editData(isset($edit) && $edit ? $edit : '') ?>
<?php isset($data) && is_object($data) ? $id = $_GET['id'] : '' ?>

<!-- Formulario -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?= isset($ident) && is_object($ident) ? '<h4>Proceso de ventas</h4>' : '<h4>Proceso de ventas</h4>' ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/index">Ventas</a>
                </li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<!-- Buttons -->
<div class="card card-white col-sm-6">
    <div class="card-body" id="container-buttons">
        <button type="submit" form="rgVenta" class="btn btn-cns btn-flat">
            Guardar <i class="far fa-save"></i>
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
                <form id="rgVenta">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="nombre">Fecha de llamada:</label>
                                <input type="text" class="form-control form-control-sm" id="fechaLlamada"
                                       value="<?= isset($data) && is_object($data) ? $data->fecha_llamada : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellido_p">Hora de llamada:</label>
                                <input type="text" class="form-control form-control-sm" id="horaLlamada"
                                       value="<?= isset($data) && is_object($data) ? $data->hora_llamada : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="apellido_m">Lada + Telefono:</label>
                                <input type="text" class="form-control form-control-sm" id="ladaTel"
                                       value="<?= isset($data) && is_object($data) ? $data->lada_tel : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Razon de llamada:</label>
                                <select class="form-control form-control-sm" id="razon">
                                    <option value="<?= isset($data) && is_object($data) ? $data->razon_llamada : '' ?>"
                                            disabled
                                            selected><?= isset($edit) && is_object($edit) ? $edit->razon_llamada : 'Selecciona'; ?></option>
                                    <option value="Prospecto">Prospecto</option>
                                    <option value="Cobrar algún servicio o producto">Cobrar algún servicio o producto
                                    </option>
                                    <option value="Busca Empleo o Recursos Humanos">Busca Empleo o Recursos Humanos
                                    </option>
                                    <option value="Quiere hablar con paciente activo">Quiere hablar con paciente
                                        activo
                                    </option>
                                    <option value="Busca persona perdida o saber si aqui esta">Busca persona perdida o
                                        saber si aqui esta
                                    </option>
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
                                <input type="text" class="form-control form-control-sm" id="nombre"
                                       value="<?= isset($data) && is_object($data) ? $data->nombre_cont : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Correo de contacto:</label>
                                <input type="text" class="form-control form-control-sm" id="correo"
                                       value="<?= isset($data) && is_object($data) ? $data->correo_cont : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Parentesco:</label>
                                <input type="text" class="form-control form-control-sm" id="parentesco"
                                       value="<?= isset($data) && is_object($data) ? $data->parentesco_cont : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Tipo de consumo:</label>
                                <input type="text" class="form-control form-control-sm" id="consumo"
                                       value="<?= isset($data) && is_object($data) ? $data->tipo_consumo : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Edad:</label>
                                <input type="text" class="form-control form-control-sm" id="edad"
                                       value="<?= isset($data) && is_object($data) ? $data->edad_cont : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre">Acepta:</label>
                                <select class="form-control form-control-sm" id="acepta">
                                    <option value="<?= isset($data) && is_object($data) ? $data->aceptacion : '' ?>"
                                            disabled
                                            selected><?= isset($data) && is_object($data) ? $data->aceptacion : 'Selecciona'; ?></option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="resp">Detalles adicionales:</label>
                            <textarea class="form-control form-control-sm" id="detalles" cols="30" rows="5">
                                <?= isset($data) && is_object($data) ? $data->detalles_ad : '' ?>
                            </textarea>
                        </div>
                    </div>
                    <?php if (!isset($edit)) : ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="resp">Nota:</label>
                                <textarea class="form-control form-control-sm" name="" id="nota" cols="30" rows="5">
                            </textarea>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="actitud">Por que medio se envio:</label>
                            <input type="text" class="form-control form-control-sm" id="medioEnvio"
                                   value="<?= isset($data) && is_object($data) ? $data->medio_de_envio : '' ?>"
                                   required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Medio por el cual se entero:</label>
                            <select class="form-control form-control-sm" id="medioEntero">
                                <option value="<?= isset($data) && is_object($data) ? $data->medio_entero : '' ?>"
                                        disabled
                                        selected><?= isset($data) && is_object($data) ? $data->medio_entero : 'Selecciona'; ?></option>
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
                            <label>Fecha de seguimiento:</label>
                            <div class="input-group date " data-target-input="nearest">
                                <input type="date" id="fechaSeg" class="form-control form-control-sm"
                                       data-target="#reservationdate"
                                       value="<?= isset($data) && is_object($data) ? $data->fecha_seguimiento : '' ?>">
                                <div class="input-group-append" data-target="#reservationdate"
                                     data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="action" value="<?= $action ?>">
                    <input type="hidden" id="ventaId" value="<?= $data->id_venta ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.table -->
<?php include "admin/layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/ventas/index.js"></script>
<script src="<?= base_url ?>assets/js/ventas/ajax.js"></script>
<script src="<?= base_url ?>admin/assets/js/table.js"></script>