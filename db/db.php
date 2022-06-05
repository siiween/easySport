<?php
class Conectar{
    public static function conexion(){
        $conexion = new mysqli("bbdd.dlsi.ua.es:3306","gi_easysport",".easysport.","information_schema");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>