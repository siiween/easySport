<?php
class suscriptions_model{
    private $db;
    private $suscription;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->suscription=array();
    }
    public function get_suscription(){
       
    }
}
?>