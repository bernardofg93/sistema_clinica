<?php

class NotaVenta
{
    private $id;
    private $nota_descripcion;
    
    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNotaDescripcion()
    {
        return $this->nota_descripcion;
    }

    public function setNotaDescripcion($nota_descripcion)
    {
        $this->nota_descripcion = $this->db->real_escape_string($nota_descripcion);
    }

    public function save()
    {
        $sql = "INSERT INTO nota_venta VALUES(NULL, {$this->getId()}, '{$this->getNotaDescripcion()}')";
        $save = $this->db->query($sql);

        if($save) {
            return ['result' => 'true'];
        }else{
            return ['result' => 'false'];
        }
    }
}