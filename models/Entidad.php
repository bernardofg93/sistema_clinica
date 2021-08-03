<?php

class Entidad
{
    private $id_entidad;
    private $nombre_entidad;

    public function getIdEntidad()
    {
        return $this->id_entidad;
    }

    public function setIdEntidad($id_entidad)
    {
        $this->id_entidad = $id_entidad;
        return $this;
    }

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getOne(){
        $sql = "SELECT 
                e.*, u.*
                FROM usuario u
                INNER JOIN entidad e ON u.entidad_id = e.id_entidad
                WHERE id_usuario = {$this->getIdUsuario()}";

        $data = $this->db->query($sql);
        return $data->fetch_object();
    }

    public function getAll(){
        $sql = "SELECT * FROM entidad ORDER BY  id_entidad ASC ";
        return $this->db->query($sql);
    }

    public function subtraction(){
        $sql = "UPDATE entidad SET cupos = cupos - 1 WHERE id_entidad = {$this->getIdEntidad()}";
        $res = $this->db->query($sql);
        var_dump($res);
        echo $this->db->error;
    }
}