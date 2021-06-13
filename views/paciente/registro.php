        <!-- comprueba si ya existe el objeto para poder editar -->
        <?php $action = Utils::validate(isset($data) && is_object($data) ? $data : '') ?>

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
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

        <div class="card card-info">
            <form id="rgPaciente">
                <div class="card-header">
                    <div class="col-md-3">
                        <h3 class="card-title">Ficha de Identificación</h3>

                        <input type="hidden" value="<?= $action ?>" id="action">
                        <input type="hidden" value="<?= $data->paciente_id ?>" id="paciente_id">
                        <input type="submit" class="btn btn-info w-100" value="Guardar">

                    </div>
                </div>
                <div class="card-body">
                    <!-- section -->
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="nombre">Nombre:</label>
                            <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="nombre" value="<?= isset($data) && is_object($data) ? $data->nombre_pa : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="edad">Edad:</label>
                            <input maxlength="3" type="text" class="form-control form-control-sm" id="edad" value="<?= isset($data) && is_object($data) ? $data->apellido_paterno_pa : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="edad">Sexo:</label>
                            <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="sexo" value="<?= isset($data) && is_object($data) ? $data->apellido_materno_pa : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="edo_civil">Estado Civil</label>
                            <select class="form-control form-control-sm" id="edo_civil">
                                <option value="" disabled selected><?= isset($data) && is_object($data) ? $data->edo_civil : 'Selecciona'; ?></option>
                                <option value="admin">Soltero(a)</option>
                                <option value="usuario">Casado(a)</option>
                                <option value="usuario">Viudo(a)</option>
                            </select>
                        </div>
                    </div><!-- end section-->

                    <!-- section -->
                    <div class="row form-group">
                        <div class="col-3">
                            <label>Fecha de nacimiento:</label>
                            <div class="input-group date " data-target-input="nearest">
                                <input type="date" id="fecha_nac" class="form-control form-control-sm" data-target="#reservationdate" value="value=" <?= isset($data) && is_object($data) ? $data->fecha_nacimiento_pa : '' ?>"" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="edad">Domicilio:</label>
                            <input type="text" class="form-control form-control-sm" id="direccion_pac" value="<?= isset($data) && is_object($data) ? $data->direccion_pac : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="edad">Teléfono :</label>
                            <input type="text" class="form-control form-control-sm" id="telefono_pac" value="<?= isset($data) && is_object($data) ? $data->telefono_pac : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="ocupacion">Ocupación:</label>
                            <input pattern="[a-zA-Z ]*" type="text" class="form-control form-control-sm" id="ocupacion" value="<?= isset($data) && is_object($data) ? $data->ocupacion_pac : '' ?>">
                        </div>
                    </div><!-- end section-->

                    <!-- section -->
                    <div class="row form-group">
                        <div class="col-3">
                            <label for=" rol">Escolaridad:</label>
                            <select class="form-control form-control-sm" id="escolaridad">
                                <option value="" disabled selected><?= isset($data) && is_object($data) ? $data->escolaridad_pac : 'Selecciona'; ?></option>
                                <option value="admin">Educación preescolar</option>
                                <option value="usuario">Educación Primaria</option>
                                <option value="usuario">Educación secundaria</option>
                                <option value="usuario">Educación media superior</option>
                                <option value="usuario">Educación superior</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="ocupacion">Salario mensual:</label>
                            <input type="text" class="form-control form-control-sm" id="salario" value="<?= isset($data) && is_object($data) ? $data->salario_mensual : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="drogas">Tiempo trabajando en el empleo actual:</label>
                            <input type="text" class="form-control form-control-sm" id="tiempo_trabajo" value="<?= isset($data) && is_object($data) ? $data->tiempo_actual_trabajo : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="acompanado">Se encuentra desempleado actualmente:</label>
                            <input type="text" class="form-control form-control-sm" id="desempleo_pac" value="<?= isset($data) && is_object($data) ? $data->desempleo_pac : '' ?>">
                        </div>
                    </div><!-- end section-->

                    <!-- section -->
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="password">¿Cuánto tiempo lleva así? </label>
                            <input type="text" class="form-control form-control-sm" id="tiempo_desempleo" value="<?= isset($data) && is_object($data) ? $data->tiempo_desempleo : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="estado_act">¿Depende económicamente de alguien?</label>
                            <input type="text" class="form-control form-control-sm" id="depende_eco" value="<?= isset($data) && is_object($data) ? $data->depende_eco : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="estado_act">¿De quién? </label>
                            <input type="text" class="form-control form-control-sm" id="depende_de" value="<?= isset($data) && is_object($data) ? $data->depende_de : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="estado_act">¿Alguien depende económicamente de usted?</label>
                            <input type="text" class="form-control form-control-sm" id="alguien_depende" value="<?= isset($data) && is_object($data) ? $data->alguien_depende : '' ?>">
                        </div>
                    </div><!-- end section-->

                    <!-- section -->
                    <div class="row form-group">
                        <div class="col-3">
                            <label for="password">¿Quién o quiénes?</label>
                            <input type="text" class="form-control form-control-sm" id="quien_depende" value="<?= isset($data) && is_object($data) ? $data->quien_depende : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="estado_act">¿Tiene pareja?</label>
                            <input type="text" class="form-control form-control-sm" id="tiene_pareja" value="<?= isset($data) && is_object($data) ? $data->tiene_pareja : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="estado_act">Tiempo de relación</label>
                            <input type="text" class="form-control form-control-sm" id="tiempo_relacion" value="<?= isset($data) && is_object($data) ? $data->tiempo_relacion : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="estado_act">Nombre de la persona responsable:</label>
                            <input type="text" class="form-control form-control-sm" id="nombre_resp" value="<?= isset($data) && is_object($data) ? $data->nom_responsable : '' ?>">
                        </div>
                    </div><!-- end section-->

                    <div class="row form-group">
                        <div class="col-3">
                            <label for="password">Dirección:</label>
                            <input type="text" class="form-control form-control-sm" id="dir_resp" value="<?= isset($data) && is_object($data) ? $data->direccion_responsable : '' ?>">
                        </div>
                        <div class="col-3">
                            <label for="password">Teléfono:</label>
                            <input type="text" class="form-control form-control-sm" id="tel_resp" value="<?= isset($data) && is_object($data) ? $data->tel_responsable : '' ?>">
                        </div>
                    </div><!-- end section-->

                </div>
            </form>
        </div>

        <!-- table -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Personas con las que el paciente vive: </h3>
                <div class="col-md-3">
                    <a class="btn btn-info btn-xl pull-right w-100" data-toggle="modal" data-target="#modalCategory">
                        <i class="fa fa-plus"></i> Ingresar nuevo registro
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="card-body">
                <table id="list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th> Nombre </th>
                            <th> Parentesco</th>
                            <th> Teléfono</th>
                            <th> Editar</th>
                            <th> Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Vive con:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <form id="rgParentes">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control form-control-sm" id="nombre_par" value="<?= isset($data) && is_object($data) ? $data->edades_hijos : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Teléfono:</label>
                                <input type="text" class="form-control form-control-sm" id="telefono_par" value="<?= isset($data) && is_object($data) ? $data->edades_hijos : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Parentesco:</label>
                                <input type="text" class="form-control form-control-sm" id="parentesco" value="<?= isset($data) && is_object($data) ? $data->edades_hijos : '' ?>">
                            </div>
                            <button type="submit" class="btn btn-info w-100"><i class="fas fa-user"></i>Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.table -->
        <?php include "admin/layout/footer.php" ?>
        <script src="<?= base_url ?>assets/js/alerts.js"></script>
        <script src="<?= base_url ?>assets/js/paciente/index.js"></script>
        <script src="<?= base_url ?>assets/js/paciente/modalPersonas.js"></script>
        <script src="<?= base_url ?>admin/assets/js/table.js"></script>