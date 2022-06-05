<?php
// Llamada al modelo
require_once("models/profile_model.php");

$pro = new profile_model();

$datos=$pro->get_profile();

//Llamada a la vista
require_once("views/profile.phtml");
?>