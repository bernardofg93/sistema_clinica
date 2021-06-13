<?php

class Entidad
{
    private $id_entidad;
    private $nombre_entidad;

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
}