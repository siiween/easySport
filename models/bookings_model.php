<?php
class bookings_model{
    private $db;
    private $bookings;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->bookings=array();
    }
    public function get_bookings(){

    }
}
?>
