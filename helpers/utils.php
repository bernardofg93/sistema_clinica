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
}
