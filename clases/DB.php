<?php
class DB
{
    public static function conexion()
    {
        $conexion = new mysqli('localhost', 'root', '', 'votaciones');

        if ($conexion->connect_errno) {
            echo "Error al conectarse con la base de datos: " . $conexion->connect_error;
            exit(0);
        }
        return $conexion;
    }
}
