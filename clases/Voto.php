<?php
class Voto
{
    public static function insertarVoto($datos)
    {
        if (self::existeVoto($datos->rut)) {
            return [
                'status' => 500,
                'message' => 'Ya existe un voto con este rut'
            ];
        }

        $sql = "INSERT INTO votos (`nombre`, `alias`, `rut`, `email`, `region`, `comuna`, `candidato`, `canal`, `fecha_creacion`) 
        VALUES ('" . $datos->nombre . "', 
        '" . $datos->alias . "', 
        '" . $datos->rut . "', 
        '" . $datos->email . "', 
        " . $datos->region . ",
        " . $datos->comuna . ",
        " . $datos->candidato . ",
        '" . implode(',', $datos->canalArr) . "', NOW());";
        $result = DB::conexion()->query($sql);
        if ($result) {
            return [
                'status' => 200,
                'message' => 'Voto guardado correctamente'
            ];
        } else {
            return [
                'status' => 500,
                'message' => 'Error al guardar el voto'
            ];
        }
    }

    public static function existeVoto($rut)
    {
        $sql = "SELECT * FROM votos WHERE rut = '$rut'";
        $result = DB::conexion()->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
