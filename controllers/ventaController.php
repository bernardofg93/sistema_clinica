<?php
require_once './models/Venta.php';
require_once './models/NotaVenta.php';

class ventaController
{
    public function index()
    {
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/index.php';
    }

    public function registro()
    {
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/registro.php';
    }

    public function registros()
    {
        $registros = new Venta();
        $reg = $registros->getAll();
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/registros.php';
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
                $nota = $_POST['nota'] ? filter_var($_POST['nota'], FILTER_SANITIZE_STRING) : false;
                $venta->setId($usuarioId);
                $data = $venta->save();
                $ventaId = $data['ventaId'];

                if ($data) {
                    $notaVenta = new NotaVenta();
                    $notaVenta->setId($ventaId);
                    $notaVenta->setNotaDescripcion($nota);
                    $notaVenta->save();
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
            require_once './admin/layout/header.php';
            require_once './admin/layout/sidebar.php';
            require_once './views/ventas/registro.php';
        }
    }
}
