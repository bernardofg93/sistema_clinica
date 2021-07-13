
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="card-title">Llamadas de seguimiento</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="<?= base_url ?>venta/registro">Registro</a>
                </li>
                <li class="breadcrumb-item active">Registros</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

<div class="card">
    <!-- /.card-header -->
    <div class="card-body" id="card-body">
        <!--
        <a href="<?= base_url ?>paciente/registro" class="btn btn-light btn-xl pull-right w-25">
            <i class="fa fa-plus"></i>Nuevo Ingreso
        </a>
        -->
        <table id="tblRegistros" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="font-size: 15px;"> Fecha llamada</th>
                    <th style="font-size: 15px;"> Fecha seguimiento</th>
                    <th style="font-size: 15px;"> Nombre</th>
                    <th style="font-size: 15px;"> Ascesor</th>
                    <th style="font-size: 15px;"> Modificar</th>
                    <th style="font-size: 15px;"> Nota Seguimiento</th>
                    <th style="font-size: 15px;"> Finalizar Seguimiento</th>
                    <th style="font-size: 15px;"> Ingreso paciente</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $reg->fetch_object()) : ?>
                    <tr>
                        <td><?= $data->fecha_llamada ?></td>
                        <td><?= $data->fecha_seguimiento ?></td>
                        <td><?= $data->nombre_cont ?></td>
                        <td><?= $data->usuario_id ?></td>
                        <td style="width:5%; text-align: center">
                            <a type="button" class="btn bg-gradient-white btn-md" href="<?= base_url ?>venta/editar&id=<?= $data->id_venta ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td style="width:5%; text-align: center">
                            <a type="button" class="btn bg-gradient-white btn-md" href="<?= base_url ?>paciente/expediente&id=<?= $pac->id_paciente ?>">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </td>
                        <td style="width:5%; text-align: center">
                            <a type="button" class="btn bg-gradient-white btn-md" href="<?= base_url ?>paciente/expediente&id=<?= $pac->id_paciente ?>">
                                <i class="fas fa-hourglass-end" style="color: #C70039;"></i>
                            </a>
                        </td>
                        <td style="width:5%; text-align: center">
                            <a type="button" class="btn bg-gradient-white btn-md" href="<?= base_url ?>paciente/registro&id=<?= base64_encode($data->id_venta) ?>">
                                <i class="fas fa-user-plus" style="color: #2471a3;"></i>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- page script -->
<?php include "admin/layout/footer.php" ?>
<script src="<?= base_url ?>assets/js/ventas/index.js"></script>
<script src="<?= base_url ?>admin/assets/js/table.js"></script>