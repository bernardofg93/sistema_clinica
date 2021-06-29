<?php

class venta
{
    private $id_venta;
    private $id;
    private $lada_tel;
    private $razon_llamada;
    private $nombre_cont;
    private $correo_cont;
    private $parentesco_cont;
    private $tipo_consumo;
    private $edad_cont;
    private $aceptacion;
    private $detalles_ad;
    private $fecha_seguimiento;
    private $medio_de_envio;
    private $medio_entero;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdVenta()
    {
        return $this->id_venta;
    }

    public function setIdVenta($id_venta)
    {
        $this->id_venta = $id_venta;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLadaTel()
    {
        return $this->lada_tel;
    }

    public function setLadaTel($lada_tel)
    {
        $this->lada_tel = $this->db->real_escape_string($lada_tel);
    }

    public function getRazonLlamada()
    {
        return $this->razon_llamada;
    }

    public function setRazonLlamada($razon_llamada)
    {
        $this->razon_llamada = $this->db->real_escape_string($razon_llamada);
    }

    public function getNombreCont()
    {
        return $this->nombre_cont;
    }

    public function setNombreCont($nombre_cont)
    {
        $this->nombre_cont = $this->db->real_escape_string($nombre_cont);
    }

    public function getCorreoCont()
    {
        return $this->correo_cont;
    }

    public function setCorreoCont($correo_cont)
    {
        $this->correo_cont = $this->db->real_escape_string($correo_cont);
    }

    public function getParentescoCont()
    {
        return $this->parentesco_cont;
    }


    public function setParentescoCont($parentesco_cont)
    {
        $this->parentesco_cont = $this->db->real_escape_string($parentesco_cont);
    }

    public function getTipoConsumo()
    {
        return $this->tipo_consumo;
    }

    public function setTipoConsumo($tipo_consumo)
    {
        $this->tipo_consumo = $this->db->real_escape_string($tipo_consumo);
    }

    public function getEdadCont()
    {
        return $this->edad_cont;
    }


    public function setEdadCont($edad_cont)
    {
        $this->edad_cont = $this->db->real_escape_string($edad_cont);
    }

    public function getAceptacion()
    {
        return $this->aceptacion;
    }

    public function setAceptacion($aceptacion)
    {
        $this->aceptacion = $aceptacion;
    }

    public function getDetallesAd()
    {
        return $this->detalles_ad;
    }

    public function setDetallesAd($detalles_ad)
    {
        $this->detalles_ad = $this->db->real_escape_string($detalles_ad);
    }

    public function getFechaSeguimiento()
    {
        return $this->fecha_seguimiento;
    }

    public function setFechaSeguimiento($fecha_seguimiento)
    {
        $this->fecha_seguimiento = $fecha_seguimiento;
    }

    public function getMedioDeEnvio()
    {
        return $this->medio_de_envio;
    }

    public function setMedioDeEnvio($medio_de_envio)
    {
        $this->medio_de_envio = $this->db->real_escape_string($medio_de_envio);
    }

    public function getMedioEntero()
    {
        return $this->medio_entero;
    }

    public function setMedioEntero($medio_entero)
    {
        $this->medio_entero = $medio_entero;
    }

    public function getAll() {
        $sql = "SELECT * FROM venta ORDER BY id_venta DESC";
        return $this->db->query($sql);
    }

    public function save()
    {
        $usuarioId = $this->id;
        $ladaTel = $this->lada_tel;
        $razonLlamada =  $this->razonLlamada;
        $nombre = $this->nombre_cont;
        $correo = $this->correo_cont;
        $parentesco = $this->parentesco_cont;
        $consumo = $this->tipo_consumo;
        $edad = $this->edad_cont;
        $acep = $this->aceptacion;
        $detalles = $this->detalles_ad;
        $fechaSeg = $this->fecha_seguimiento;
        $medioEnv = $this->medio_de_envio;
        $medioEnt = $this->medio_entero;

        $sql = "INSERT INTO venta VALUES
                                    (
                                     NULL, '$usuarioId', CURDATE(), CURTIME(), '$ladaTel', '$razonLlamada',
                                     '$nombre','$correo', '$parentesco','$consumo','$edad', 
                                     '$acep', '$detalles', '$fechaSeg','$medioEnv', '$medioEnt'
                                     )";
        $save = $this->db->query($sql);
        
        if ($save) {
            return [
                'res' => 'true',
                'ventaId' => $ventaId = $this->db->insert_id
            ];
        } else {
            return ['res' => 'false'];
        }
    }
}
