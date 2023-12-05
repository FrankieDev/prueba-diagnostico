<?php
class Candidato
{
    public static function getCandidatos()
    {
        $sql = "SELECT * FROM candidatos";
        $result = DB::conexion()->query($sql);
        $data = [];
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }
}
