<?php

class Conexion
{
    protected $dbhost;

    protected function Conexion()
    {
        try {
            $conexion = $this->dbhost = new PDO("mysql:host=localhost; dbname=api_usuarios;", "root", "");
            return $conexion;
        } catch (Exception $e) {
            print "Error Base de datos" . $e->getMessage();
            die();
        }       
    }
}
