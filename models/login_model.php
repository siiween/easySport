<?php
class login_model{
    private $db;
    private $login;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->login=array();
    }
    public function get_login(){
        
    }
}
?>