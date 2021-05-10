<?php 
include("../modelo/Categoria.php");

$pk = $_POST['pk'];

$obj = new Categoria();
$obj->eliminar($pk);
?>