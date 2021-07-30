<?php

class Utils
{
    public static function validate($data)
    {
        $action = 'create';
        if ($data) {
            $action = 'edit';
        }
        return $action;
    }

    public static function editData($edit){
        $action = 'create';
        if ($edit) {
            $action = 'edit';
        }
        return $action;
    }

    public static function getAllNotes($id){
        require_once './models/NotaVenta.php';
        $notas = new NotaVenta();
        $notas->setId($id);
        return $res = $notas->getAll();
    }
}
