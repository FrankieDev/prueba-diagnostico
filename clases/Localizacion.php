<?php
class Localizacion
{
    public static function getRegiones()
    {
        $sql = "SELECT * FROM regiones";
        $result = DB::conexion()->query($sql);

        $data = [];
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }

    public static function getComunas($id)
    {
        $sql = "SELECT * FROM comunas WHERE region_id = $id";
        $result = DB::conexion()->query($sql);

        $data = array();
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }

        return $data;
    }
}
