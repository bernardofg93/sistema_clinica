<?php
require_once './models/Venta.php';
require_once './models/NotaVenta.php';

class ventaController
{
    public function index()
    {
        $llamadaSeguimiento = new Venta();
        $llamadas = $llamadaSeguimiento->getLLamadasSeguimiento();
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/index.php';
    }

    public function fecha()
    {
        require_once './views/fecha.php';
    }

    public function registro()
    {
        $identity = $_SESSION['identity']->nombre_us;
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/registro.php';
    }

    public function finalizar()
    {
        if ($_GET['id']) {
            $id = isset($_GET) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
            $fin = new Venta();
            $fin->set3Id($id);
            $res = $fin->finalizarSeguimiento();
        }
        echo json_encode($res);
    }

    public function test()
    {
        $registros = new Venta();
        $arrData = $registros->getAllObj();
        for ($i = 0; $i < count($arrData); $i++) {

            if ($arrData[$i]['fecha_seguimiento'] == 0) {
                $arrData[$i]['estado_ve'] = '<span class="badge badge-danger">Inactivo</span>';
            } else {
                $arrData[$i]['estado_ve'] = '<span class="badge badge-success">Activo</span>';
            }
            $arrData[$i]['edit'] =
                '<a href=http://localhost/clinica_soft/venta/editar&id=' . $arrData[$i]['id_venta'] . ' class="btn bg-gradient-white btn-md btn-table"><i class="fas fa-edit"></i></a>';
            $arrData[$i]['nota'] =
                '<a href=http://localhost/clinica_soft/venta/saveNota&id=' . $arrData[$i]['id_venta'] . ' class="btn bg-gradient-white btn-md btn-table"><i class="fas fa-file-alt"></i></a>';
            $arrData[$i]['finalizar'] =
                '<a data-id=' . $arrData[$i]['id_venta'] . ' class="btn bg-gradient-white btn-md finSeg btn-table"><i class="fas fa-hourglass-end finSeg" data-id=' . $arrData[$i]['id_venta'] . '></i></a>';
            $arrData[$i]['ingreso'] =
                '<a href=http://localhost/clinica_soft/paciente/registro&idv=' . $arrData[$i]['id_venta'] . ' class="btn bg-gradient-white btn-md btn-table"><i class="fas fa-user-plus"></i></a>';
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function principalTable()
    {
        $data = new Venta();
        $reg = $data->getAll();
        echo json_encode($reg, JSON_UNESCAPED_UNICODE);
    }

    public function registros()
    {
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/registros.php';
    }

    public function saveNota()
    {
        if (isset($_POST)) {
            $idVenta = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_VALIDATE_INT) : false;
            $notaSeg = isset($_POST['notaSeg']) ? filter_var($_POST['notaSeg'], FILTER_SANITIZE_STRING) : false;
            $idUs = $_SESSION['identity']->id_usuario;
            $nota = new NotaVenta();
            $nota->setId($idVenta);
            $nota->setUsuarioId($idUs);
            $nota->setNotaDescripcion($notaSeg);
            $nota->save();
        }
    }

    public function save()
    {
        if (isset($_POST)) {
            $ladaTel = $_POST['ladaTel'] ? filter_var($_POST['ladaTel'], FILTER_SANITIZE_STRING) : false;
            $razonLlamada = $_POST['razonLlamada'] ? filter_var($_POST['razonLlamada'], FILTER_SANITIZE_STRING) : false;
            $nombre = $_POST['nombre'] ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $correo = $_POST['correo'] ? filter_var($_POST['correo'], FILTER_SANITIZE_STRING) : false;
            $parentesco = $_POST['parentesco'] ? filter_var($_POST['parentesco'], FILTER_SANITIZE_STRING) : false;
            $consumo = $_POST['consumo'] ? filter_var($_POST['consumo'], FILTER_SANITIZE_STRING) : false;
            $edad = $_POST['edad'] ? filter_var($_POST['edad'], FILTER_VALIDATE_INT) : false;
            $aceptada = $_POST['aceptada'] ? filter_var($_POST['aceptada'], FILTER_SANITIZE_STRING) : false;
            $detalles = $_POST['detalles'] ? filter_var($_POST['detalles'], FILTER_SANITIZE_STRING) : false;
            $medioEnvio = $_POST['medioEnvio'] ? filter_var($_POST['medioEnvio'], FILTER_SANITIZE_STRING) : false;
            $medioEntero = $_POST['medioEntero'] ? filter_var($_POST['medioEntero'], FILTER_SANITIZE_STRING) : false;
            $fechaSeg = $_POST['fechaSeg'] ? filter_var($_POST['fechaSeg'], FILTER_SANITIZE_STRING) : false;
            $usuarioId = $_SESSION['identity']->id_usuario;

            $venta = new Venta();
            $venta->setLadaTel($ladaTel);
            $venta->setRazonLlamada($razonLlamada);
            $venta->setNombreCont($nombre);
            $venta->setCorreoCont($correo);
            $venta->setParentescoCont($parentesco);
            $venta->setTipoConsumo($consumo);
            $venta->setEdadCont($edad);
            $venta->setAceptacion($aceptada);
            $venta->setDetallesAd($detalles);
            $venta->setFechaSeguimiento($fechaSeg);
            $venta->setMedioDeEnvio($medioEnvio);
            $venta->setMedioEntero($medioEntero);

            if ($_POST['action'] == 'create') {
                $venta->setId($usuarioId);
                $data = $venta->save();
                $ventaId = $data['ventaId'];

                $notaVenta = new NotaVenta();
                $arr = json_decode($_POST['arrData'], true);
                $idUs = $_SESSION['identity']->id_usuario;

                if ($data) {
                    foreach ($arr as $row) {
                        $notaVenta->setId($ventaId);
                        $notaVenta->setUsuarioId($idUs);
                        $notaVenta->setNotaDescripcion(filter_var($row['nota'], FILTER_SANITIZE_STRING));
                        $notaVenta->save();
                    }
                }
            } else {
                $ventaId = $_POST['ventaId'] ? filter_var($_POST['ventaId'], FILTER_VALIDATE_INT) : false;
                $venta->setId($ventaId);
                $data = $venta->edit();
            }
        }
        echo json_encode($data);
    }

    public function editar()
    {
        if (isset($_GET['id'])) {
            $edit = true;
            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
            $venta = new Venta();
            $venta->setId($id);
            $data = $venta->getOne();
            //obtenemos las notas para mandarlas a la vista
            $notas = new NotaVenta();
            $notas->setId($id);
            $dataArr = $notas->getAll();
            $arr = json_decode(json_encode($dataArr), true);
            require_once './admin/layout/header.php';
            require_once './admin/layout/sidebar.php';
            require_once './views/ventas/registro.php';
        }
    }
}
