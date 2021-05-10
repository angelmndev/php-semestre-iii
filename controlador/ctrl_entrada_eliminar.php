<?php 
include("../modelo/Entrada.php");

$pk = $_POST['pk'];

$obj = new Entrada();
$obj->eliminar($pk);
?>