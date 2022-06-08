<?php

require_once("../db/db.php");
// Llamada al modelo
require_once("../models/facilities_model.php");


$fac = new facilities_model();

$datos=$fac->get_facilities();



//Llamada a la vista
require_once("../views/facilities.phtml");
?>