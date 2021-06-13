<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', 'root', 'db_sistema_clinica_01');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
