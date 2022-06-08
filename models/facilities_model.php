<?php


class facilities_model{
    private $db;
    private $facilities;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->facilities=array();
    }

    public function get_facilities(){
        
        $consulta=$this->db->query("select * from facility;");

        while($filas=$consulta->fetch_assoc()){
            $this->facilities[]=$filas;
        }

        return $this->facilities;
        
    }
}
?>