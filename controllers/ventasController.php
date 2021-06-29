<?php

class ventasController {

    public function index() {
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/index.php';
    }

    public function registro(){
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/ventas/registro.php';
    }
}