<?php 
include("../modelo/Categoria.php");

$pk = $_POST['pk'];

$categoria = $_POST['cat'];

$obj = new Categoria($categoria);

$obj->actualizar($pk);

?>