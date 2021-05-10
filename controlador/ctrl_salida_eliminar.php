<?php 
include("../modelo/Salida.php");

$pk = $_POST['pk'];

$obj = new Salida();
$obj->eliminar($pk);
?>