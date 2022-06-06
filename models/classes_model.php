<?php
class classes_model{
    private $db;
    private $classes;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->classes=array();
    }
    public function get_classes(){
        $consulta=$this->db->query("select * from class;");
        while($filas=$consulta->fetch_assoc()){
            $this->classes[]=$filas;
        }
        return $this->classes;
    }
}
?>