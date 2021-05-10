<?php 
include("../modelo/Producto.php");

$pk = $_POST['pk'];

$obj = new Producto();
$obj->eliminar($pk);
?>