<?php
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
}
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="<?= base_url ?>admin/layout/dist/img/user4-128x128.jpg"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= isset($pac) && is_object($pac) ? $pac->nombre_pac : ''; ?></h3>

                            <!--<p class="text-muted text-center">Software Engineer</p>-->

                            <a href="#" class="btn btn-primary btn-block"><b>Informacion</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col section tabs-->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Documentos</a>
                                </li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>-->
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuraciones</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <!-- Main content -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <!-- Small boxes (Stat box) -->
                                            <div class="row">
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-info">
                                                        <div class="inner">
                                                            <?php if (isset($data) && is_object($data)) : ?>
                                                                <i class="fas fa-check"></i>
                                                            <?php else : ?>
                                                                <i class="fas fa-plus"></i>
                                                            <?php endif; ?>
                                                            <p>Consumo Sustancias</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-user-alt"></i>
                                                        </div>
                                                        <a href="<?= base_url ?>consumoSustancias/registro&id=<?= $id ?>"
                                                           class="small-box-footer"> <i
                                                                    class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col -->
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-success">
                                                        <div class="inner">
                                                            <?php if (isset($info) && is_object($info)) : ?>
                                                                <i class="fas fa-check"></i>
                                                            <?php else : ?>
                                                                <i class="fas fa-plus"></i>
                                                            <?php endif; ?>
                                                            <p>Disposición al Cambio</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-stats-bars"></i>
                                                        </div>
                                                        <a href="<?= base_url ?>dispocisionCambio/registro&id=<?= $id ?>"
                                                           class="small-box-footer"> <i
                                                                    class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col -->
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-warning">
                                                        <div class="inner">
                                                            <?php if (isset($dom) && is_object($dom)) : ?>
                                                                <i class="fas fa-check"></i>
                                                            <?php else : ?>
                                                                <i class="fas fa-plus"></i>
                                                            <?php endif; ?>
                                                            <p>SITUACIÓN SOCIAL FAMILIAR</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-person-add"></i>
                                                        </div>
                                                        <a href="<?= base_url ?>situacionSocialFamiliar/registro&id=<?= $id ?>"
                                                           class="small-box-footer"> <i
                                                                    class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col -->
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-danger">
                                                        <div class="inner">
                                                            <?php if (isset($sust) && is_object($sust)) : ?>
                                                                <i class="fas fa-check"></i>
                                                            <?php else : ?>
                                                                <i class="fas fa-plus"></i>
                                                            <?php endif; ?>

                                                            <p>sustancias</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ion ion-pie-graph"></i>
                                                        </div>
                                                        <a href="<?= base_url ?>consumo/paciente&id=<?= $id ?>"
                                                           class="small-box-footer"><i
                                                                    class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col -->
                                            </div>
                                    </section>
                                    <!-- /.row -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                    email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                    accepted your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your
                                                    post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-success">
                                              3 Jan. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                                </h3>

                                                <div class="timeline-body">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <div class="">
                                        <!-- Main content -->
                                        <section class="content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">General</h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                        data-card-widget="collapse" title="Collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Asignar usuario:</label>
                                                                    <select class="select2 form-control-sm"
                                                                            style="width: 100%;" id="rol">
                                                                        <?php while ($data = $us->fetch_object()) : ?>
                                                                            <?php
                                                                            $arr = (array)$data;
                                                                            ?>
                                                                            <option value="<?php echo base64_encode(serialize($arr)); ?>"><?= $data->nombre_us ?> <?= $data->rol ?></option>
                                                                        <?php endwhile ?>
                                                                    </select>
                                                                    <!-- paciente id -->
                                                                    <input type="hidden" id="paciente_id"
                                                                           value="<?= $pac->id_paciente ?>"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <div class="col-md-6" id="list-asigns">
                                                    <div class="card card-info">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Asignaciones</h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                        data-card-widget="collapse" title="Collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body card-asigns">
                                                            <?php while ($asign = $as->fetch_object()) : ?>
                                                                <div class="container-asigns">
                                                                    <div class="paciente-asigns" id="ajax-data">
                                                                        <div>
                                                                            <p><?= $asign->nombre_us ?></p>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#">Cambiar</a>
                                                                        </div>
                                                                        <div>
                                                                            <a class="btn-delete-asign"
                                                                               data_id="<?= $asign->id_asignacion ?>"
                                                                               href="#">Eliminar</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endwhile; ?>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>

                                            </div>
                                        </section>
                                        <!-- /.content -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script src="<?= base_url ?>assets/js/paciente/asignacion.js"></script>
    <script src="<?= base_url ?>assets/js/paciente/expediente.js"></script>
<?php include "admin/layout/footer.php" ?>