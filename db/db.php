<?php
class Conectar{
    public static function conexion(){
        try{
            $conexion = new mysqli("bbdd.dlsi.ua.es:3306","gi_easysport2",".easysport.","information_schema");
            return $conexion;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
    }
}
?> 