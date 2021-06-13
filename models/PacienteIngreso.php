<?php

class PacienteIngreso
{
    private $id;
    private $paciente_id;
    private $edad_pa;
    private $estado_civil_ip;
    private $hijos_ip;
    private $edades_hijos_ip;
    private $ocupacion_ip;
    private $vive_con_ip;
    private $calle_vive_ip;
    private $ext_vive_ip;
    private $interior_ip;
    private $colonia_ip;
    private $ciudad_vive_ip;
    private $codigo_postal_ip;
    private $estado_vive_ip;
    private $pais_vive_ip;
    private $modo_se_entero;
    private $recomendado_por;
    private $resp_legal;
    private $estado_actitud;
    private $observaciones_ingreso;
    private $adiccion_ip;
    private $tratamiento_ip;
    private $ingreso_ip;
    private $precio_tratamiento_ip;
    private $precio_letra;
    private $moneda_ip;
    private $duracion_ip;
    private $deposito_ip;
    private $deposito_letra;
    private $forma_pago_ip;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;
        return $this;
    }

    public function getEdadPa()
    {
        return $this->edad_pa;
    }

    public function setEdadPa($edad_pa)
    {
        $this->edad_pa = $edad_pa;
        return $this;
    }

    public function getEstadoCivilIp()
    {
        return $this->estado_civil_ip;
    }

    public function setEstadoCivilIp($estado_civil_ip)
    {
        $this->estado_civil_ip = $estado_civil_ip;
        return $this;
    }

    public function getHijosIp()
    {
        return $this->hijos_ip;
    }

    public function setHijosIp($hijos_ip)
    {
        $this->hijos_ip = $hijos_ip;
        return $this;
    }

    public function getEdadesHijosIp()
    {
        return $this->edades_hijos_ip;
    }

    public function setEdadesHijosIp($edades_hijos_ip)
    {
        $this->edades_hijos_ip = $edades_hijos_ip;
        return $this;
    }

    public function getOcupacionIp()
    {
        return $this->ocupacion_ip;
    }

    public function setOcupacionIp($ocupacion_ip)
    {
        $this->ocupacion_ip = $ocupacion_ip;
        return $this;
    }

    public function getViveConIp()
    {
        return $this->vive_con_ip;
    }

    public function setViveConIp($vive_con_ip)
    {
        $this->vive_con_ip = $vive_con_ip;
        return $this;
    }

    public function getCalleViveIp()
    {
        return $this->calle_vive_ip;
    }

    public function setCalleViveIp($calle_vive_ip)
    {
        $this->calle_vive_ip = $calle_vive_ip;
        return $this;
    }

    public function getExtViveIp()
    {
        return $this->ext_vive_ip;
    }

    public function setExtViveIp($ext_vive_ip)
    {
        $this->ext_vive_ip = $ext_vive_ip;
        return $this;
    }

    public function getInteriorIp()
    {
        return $this->interior_ip;
    }

    public function setInteriorIp($interior_ip)
    {
        $this->interior_ip = $interior_ip;
        return $this;
    }

    public function getColoniaIp()
    {
        return $this->colonia_ip;
    }

    public function setColoniaIp($colonia_ip)
    {
        $this->colonia_ip = $colonia_ip;
        return $this;
    }

    public function getCiudadViveIp()
    {
        return $this->ciudad_vive_ip;
    }

    public function setCiudadViveIp($ciudad_vive_ip)
    {
        $this->ciudad_vive_ip = $ciudad_vive_ip;
        return $this;
    }

    public function getCodigoPostalIp()
    {
        return $this->codigo_postal_ip;
    }

    public function setCodigoPostalIp($codigo_postal_ip)
    {
        $this->codigo_postal_ip = $codigo_postal_ip;
        return $this;
    }

    public function getEstadoViveIp()
    {
        return $this->estado_vive_ip;
    }

    public function setEstadoViveIp($estado_vive_ip)
    {
        $this->estado_vive_ip = $estado_vive_ip;
        return $this;
    }

    public function getPaisViveIp()
    {
        return $this->pais_vive_ip;
    }

    public function setPaisViveIp($pais_vive_ip)
    {
        $this->pais_vive_ip = $pais_vive_ip;
        return $this;
    }

    public function getModoSeEntero()
    {
        return $this->modo_se_entero;
    }

    public function setModoSeEntero($modo_se_entero)
    {
        $this->modo_se_entero = $modo_se_entero;
        return $this;
    }

    public function getRecomendadoPor()
    {
        return $this->recomendado_por;
    }

    public function setRecomendadoPor($recomendado_por)
    {
        $this->recomendado_por = $recomendado_por;
        return $this;
    }

    public function getRespLegal()
    {
        return $this->resp_legal;
    }

    public function setRespLegal($resp_legal)
    {
        $this->resp_legal = $resp_legal;
        return $this;
    }

    public function getEstadoActitud()
    {
        return $this->estado_actitud;
    }

    public function setEstadoActitud($estado_actitud)
    {
        $this->estado_actitud = $estado_actitud;
        return $this;
    }

    public function getObservacionesIngreso()
    {
        return $this->observaciones_ingreso;
    }

    public function setObservacionesIngreso($observaciones_ingreso)
    {
        $this->observaciones_ingreso = $observaciones_ingreso;
        return $this;
    }

    public function getAdiccionIp()
    {
        return $this->adiccion_ip;
    }

    public function setAdiccionIp($adiccion_ip)
    {
        $this->adiccion_ip = $adiccion_ip;
        return $this;
    }

    public function getTratamientoIp()
    {
        return $this->tratamiento_ip;
    }

    public function setTratamientoIp($tratamiento_ip)
    {
        $this->tratamiento_ip = $tratamiento_ip;
        return $this;
    }

    public function getIngresoIp()
    {
        return $this->ingreso_ip;
    }

    public function setIngresoIp($ingreso_ip)
    {
        $this->ingreso_ip = $ingreso_ip;
        return $this;
    }

    public function getPrecioTratamientoIp()
    {
        return $this->precio_tratamiento_ip;
    }

    public function setPrecioTratamientoIp($precio_tratamiento_ip)
    {
        $this->precio_tratamiento_ip = $precio_tratamiento_ip;
        return $this;
    }

    public function getPrecioLetra()
    {
        return $this->precio_letra;
    }

    public function setPrecioLetra($precio_letra)
    {
        $this->precio_letra = $precio_letra;
        return $this;
    }

    public function getMonedaIp()
    {
        return $this->moneda_ip;
    }

    public function setMonedaIp($moneda_ip)
    {
        $this->moneda_ip = $moneda_ip;
        return $this;
    }

    public function getDuracionIp()
    {
        return $this->duracion_ip;
    }

    public function setDuracionIp($duracion_ip)
    {
        $this->duracion_ip = $duracion_ip;
        return $this;
    }

    public function getDepositoIp()
    {
        return $this->deposito_ip;
    }

    public function setDepositoIp($deposito_ip)
    {
        $this->deposito_ip = $deposito_ip;
        return $this;
    }

    public function getDepositoLetra()
    {
        return $this->deposito_letra;
    }

    public function setDepositoLetra($deposito_letra)
    {
        $this->deposito_letra = $deposito_letra;
        return $this;
    }

    public function getFormaPagoIp()
    {
        return $this->forma_pago_ip;
    }

    public function setFormaPagoIp($forma_pago_ip)
    {
        $this->forma_pago_ip = $forma_pago_ip;
        return $this;
    }

    public function getAll(){
        $sql = "SELECT 
                * FROM ingreso_paciente i 
                INNER JOIN paciente p ON i.paciente_id = p.id_paciente
                WHERE id_ingreso_paciente = {$this->getId()} AND paciente_id = {$this->getPacienteId()}";
                $res = $this->db->query($sql);
       return $res->fetch_object();
    }

    public function save()
    {
        $usuario_id = $this->id;
        $paciente_id = $this->paciente_id;
        $edad = $this->edad_pa;
        $civil = $this->estado_civil_ip;
        $hijos = $this->hijos_ip;
        $edades = $this->edades_hijos_ip;
        $ocupacion = $this->ocupacion_ip;
        $vive = $this->vive_con_ip;
        $calle = $this->calle_vive_ip;
        $ext = $this->ext_vive_ip;
        $interior = $this->interior_ip;
        $colonia = $this->colonia_ip;
        $ciudad_vive = $this->ciudad_vive_ip;
        $postal = $this->codigo_postal_ip;
        $estado_vive = $this->estado_vive_ip;
        $pais = $this->pais_vive_ip;
        $modo = $this->modo_se_entero;
        $recomendado = $this->recomendado_por;
        $legal = $this->resp_legal;
        $actitud = $this->estado_actitud;
        $observaciones = $this->observaciones_ingreso;
        $adiccion = $this->adiccion_ip;
        $tratamiento = $this->tratamiento_ip;
        $ingreso = $this->ingreso_ip;
        $precio = $this->precio_tratamiento_ip;
        $precio_letra = $this->precio_letra;
        $moneda = $this->moneda_ip;
        $duracion = $this->duracion_ip;

        $deposito = $this->deposito_ip;
        $deposito_letra = $this->deposito_letra;
        $forma_pago = $this->forma_pago_ip;

        $sql = "INSERT INTO ingreso_paciente VALUES
                                    (
                                     NULL, NULL, '$paciente_id', '$usuario_id', '$edad', '$civil', '$hijos', '$edades'
                                     '$ocupacion', '$vive', '$calle', '$calle', '$ext',
                                     '$interior', '$colonia', '$ciudad_vive', '$postal',
                                     '$estado_vive', '$pais', '$modo', '$recomendado',
                                     '$legal', '$actitud', '$observaciones',
                                     '$adiccion', '$tratamiento', '$ingreso', '$precio',
                                     '$precio_letra','$moneda', '$duracion', '$deposito', '$deposito_letra',
                                     '$forma_pago', CURDATE(), CURTIME()
                                     )";
        $save = $this->db->query($sql);

        if ($save) {
            return [
                'res' => 'true',
                'paciente_id' => $paciente_id,
                'ingreso_id' => $ingreso_id = $this->db->insert_id
            ];
        } else {
            return ['res' => 'false'];
        }
    }

}
