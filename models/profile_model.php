<?php
class profile_model{
    private $db;
    private $profile;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->profile=array();
    }
    public function get_profile(){
       
    }
}
?>