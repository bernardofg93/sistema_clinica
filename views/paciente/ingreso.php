<?php $action = Utils::validate(isset($data) && is_object($data) ? $data : '') ?>

<?php isset($data) && is_object($data) ? $id = $_GET['id'] : '' ?>

<?php if (isset($reingreso) && $reingreso) : ?>
    <?php $action = 'reingreso'; ?>
<?php endif; ?>

<!-- Formulario -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <?= isset($ident) && is_object($ident) ? '<h4>Formulario de Reingreso</h4>' : '<h4>Formulario de ingreso</h4>' ?>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>paciente/registros">Registros</a>
                </li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<!-- Buttons -->
<div class="card card-white col-sm-6">
    <!-- /.card-header -->
    <div class="card-body" id="container-buttons">
        <button type="submit" form="rgPaciente" class="btn btn-cns btn-flat"><i
            <i class="far fa-save"></i>
        </button>
        <a type="button" id="btnCreate" class="btn btn-cns btn-flat" data-toggle="modal" data-target="#modalCategory">
        <i class="far fa-list-alt"></i>
        </a>
        <a type="button" class="btn btn-danger btn-flat"
           href="<?= base_url ?>docs/contrato_ingreso_esp.php?&id=<?= $data->id_paciente ?>">
            <i class="fas fa-file-pdf"></i>
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
                                <label for="nombre">Nombre:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="nombre"
                                       value="<?= isset($ident) && is_object($ident) ? $ident->nombre_pa : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellido_p">Apellido Paterno:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                       id="apellido_p"
                                       value="<?= isset($ident) && is_object($ident) ? $ident->apellido_paterno_pa : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label for="apellido_m">Apellido Materno:</label>
                                <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                       id="apellido_m"
                                       value="<?= isset($ident) && is_object($ident) ? $ident->apellido_materno_pa : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lugar_nac">Lugar Nacimiento:</label>
                                <input type="text" class="form-control form-control-sm" id="lugar_nac"
                                       value="<?= isset($ident) && is_object($ident) ? $ident->lugar_nacimiento_pa : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <div class="input-group date " data-target-input="nearest">
                                    <input type="date" id="fecha_nac" class="form-control form-control-sm"
                                           data-target="#reservationdate"
                                           value="<?= isset($ident) && is_object($ident) ? $ident->fecha_nacimiento_pa : '' ?>">
                                    <div class="input-group-append" data-target="#reservationdate"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="text" class="form-control form-control-sm" id="edad"
                                       value="<?= isset($edit) && is_object($edit) ? $edit->edad_pa : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rol">Estado Civil:</label>
                                <select class="form-control form-control-sm" id="civil">
                                    <option value="<?= isset($edit) && is_object($edit) ? $edit->estado_civil_ip : '' ?>"
                                            disabled
                                            selected><?= isset($edit) && is_object($edit) ? $edit->estado_civil_ip : 'Selecciona'; ?></option>
                                    <option value="Soltero(a)">Soltero(a)</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                    <option value="Viudo(a)">Viudo(a)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="hijos">Hijos:</label>
                                <select class="form-control form-control-sm" id="hijos">
                                    <option value="<?= isset($edit) && is_object($edit) ? $edit->hijos_ip : '0' ?>"
                                            disabled
                                            selected><?= isset($edit) && is_object($edit) ? $edit->hijos_ip : 'Selecciona'; ?></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="edades">Edades:</label>
                                <input type="text" class="form-control form-control-sm" id="edades"
                                       value="<?= isset($edit) && is_object($edit) ? $edit->edades_hijos_ip : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ocupacion">Ocupación:</label>
                                <input type="text" class="form-control form-control-sm" id="ocupacion"
                                       value="<?= isset($edit) && is_object($edit) ? $edit->ocupacion_ip : '' ?>">
                            </div>
                        </div>
                    </div>

            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-white">
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="rgPaciente">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ocupacion">Vive con:</label>
                                    <input type="text" class="form-control form-control-sm" id="vive_con"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->vive_con_ip : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="calle">Calle:</label>
                                    <input type="text" class="form-control form-control-sm" id="calle"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->calle_vive_ip : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="colonia">Colonia:</label>
                                    <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                           id="colonia"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->colonia_ip : '' ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ext">Ext:</label>
                                    <input type="text" class="form-control form-control-sm" id="ext"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->ext_vive_ip : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="interior">Int:</label>
                                    <input type="text" class="form-control form-control-sm" id="interior"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->interior_ip : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cp">CP:</label>
                                    <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="cp"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->codigo_postal_ip : '' ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="ciudad">Ciudad:</label>
                                    <input type="text" class="form-control form-control-sm" id="ciudad"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->ciudad_vive_ip : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="estado_vive">Estado:</label>
                                    <input type="text" class="form-control form-control-sm" id="estado_vive"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->estado_vive_ip : '' ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="pais">País:</label>
                                    <input type="text" class="form-control form-control-sm" id="pais"
                                           value="<?= isset($edit) && is_object($edit) ? $edit->pais_vive_ip : '' ?>">
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
                            <label for="hijos">Medio por el cual:</label>
                            <select class="form-control form-control-sm" id="se_entrero">
                                <option value="<?= isset($edit) && is_object($edit) ? $edit->modo_se_entero : '0' ?>"
                                        disabled
                                        selected><?= isset($edit) && is_object($edit) ? $edit->modo_se_entero : 'Selecciona'; ?></option>
                                <option value="Internet">Internet</option>
                                <option value="Recomendación">Recomendación</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Conferencia">Conferencia</option>
                                <option value="Radio">Radio</option>
                                <option value="Televisión">Televisión</option>
                                <option value="Redes Sociales">Redes Sociales</option>
                                <option value="Folleto">Folleto</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="recomendado">Recomendado por:</label>
                            <input type="text" class="form-control form-control-sm" id="recomendado" disabled="disabled"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->recomendado_por : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="resp">Resp Legal:</label>
                            <input type="text" class="form-control form-control-sm" id="resp"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->resp_legal : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="actitud">Estado y actitud al ingresar:</label>
                            <input type="text" class="form-control form-control-sm" id="actitud"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->estado_actitud : '' ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="observaciones">Observaciones al ingresar:</label>
                            <input type="text" class="form-control form-control-sm" id="observaciones"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->observaciones_ingreso : '' ?>"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                            <!-- /.card-header -->
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Parentesco</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                    </tr>
                                    </thead>
                                    <tbody id="contactosPaciente">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card card-white">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nombre">Adicción o tratamiento:</label>
                                <select class="form-control form-control-sm" id="adiccion">
                                    <option value="<?= isset($edit) && is_object($edit) ? $edit->adiccion_ip : '' ?>"
                                            disabled
                                            selected><?= isset($edit) && is_object($edit) ? $edit->adiccion_ip : 'Selecciona'; ?></option>
                                    <option value="Alcoholismo">Alcoholismo</option>
                                    <option value="Drogadicción">Drogadicción</option>
                                    <option value="Trastorno Mental">Trastorno Mental</option>
                                    <option value="Trastorno Alimenticio">Trastorno Alimenticio</option>
                                    <option value="Ludopatía">Ludopatía</option>
                                    <option value="Ingobernabilidad">Ingobernabilidad</option>
                                    <option value="Codependencia">Codependencia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Tratamiento:</label>
                            <select class="form-control form-control-sm" id="tratamiento">
                                <option value="<?= isset($edit) && is_object($edit) ? $edit->tratamiento_ip : '' ?>"
                                        disabled
                                        selected><?= isset($edit) && is_object($edit) ? $edit->tratamiento_ip : 'Selecciona'; ?></option>
                                <option value="CAP1">CAP1</option>
                                <option value="CAP2">CAP2</option>
                                <option value="CAS">CAS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="nombre">Ingreso:</label>
                            <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                   id="ingreso"
                                   value="<?= isset($edit) && is_object($edit) ? $data->ingreso_ip : '' ?> ">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Precio:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="precio_trat"
                                       value="<?= isset($edit) && is_object($edit) ? $edit->precio_tratamiento_ip : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="nombre">Precio con letra:</label>
                            <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm"
                                   id="precio_letra"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->precio_letra : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nombre">Duracion:</label>
                            <div class="field-duracion">
                                <input type="text" class="form-control form-control-sm" id="duracion"
                                       value="<?= isset($edit) && is_object($edit) ? $edit->duracion_ip : '' ?>">
                                <div id="txt-bx">
                                    <label for="txt-duracion" id="cont-duracion">

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="deposito_ip">Deposito:</label>
                            <input type="text" class="form-control form-control-sm" id="deposito_ip"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->deposito_ip : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="rol">Moneda</label>
                            <select class="form-control form-control-sm" id="moneda">
                                <option value="<?= isset($edit) && is_object($edit) ? $edit->moneda_ip : '' ?>"
                                        disabled
                                        selected><?= isset($edit) && is_object($edit) ? $edit->moneda_ip : 'Selecciona'; ?></option>
                                <option value="USD">USD</option>
                                <option value="MXN">MXN</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="nombre">Deposito letra:</label>
                            <input type="text" class="form-control form-control-sm" id="deposito_letra"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->deposito_letra : '' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nombre">Forma de Pago Saldo:</label>
                            <input type="text" class="form-control form-control-sm" id="forma_pago"
                                   value="<?= isset($edit) && is_object($edit) ? $edit->forma_pago_ip : '' ?>">
                        </div>
                    </div>
                </div>

                <input type="hidden" id="paciente_id" value="<?= $id ?>"/>
                <input type="hidden" id="action" value="<?= $action ?>"/>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
                <input type="hidden" id="paciente_id" value="<?= $id ?>"/>
                <input type="hidden" id="action" value="<?= $action ?>"/>
                </form>
            </div>
</div>

<!-- Modal Create-->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <form id="cpForm">
                    <div class="form-group">
                        <label for="nombre">Nombre contacto:</label>
                        <input type="text" class="form-control" id="nombreCp">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Telefono contacto:</label>
                        <input type="text" class="form-control" id="telCp">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Correo contacto:</label>
                        <input type="text" class="form-control" id="correoCp">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Parentesco:</label>
                        <input type="text" class="form-control" id="parentescoCp">
                    </div>
                    <input type="hidden" name="" id="actionContact" value="">
                    <input type="hidden" name="" id="ingreso_id" value="">
                    <input type="hidden" name="" id="paciente_id" value="">
                    <button type="submit" class="btn btn-cns btn-flatt"><i
                        <i class="far fa-save"> Guardar</i>
                    </button>
                </form>

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
