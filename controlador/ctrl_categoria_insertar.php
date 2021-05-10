<?php 
include("../modelo/Categoria.php");

$categoria = $_POST['cat'];
$foto ="";


$obj = new Categoria($categoria,$foto);
$obj->insertar();

?>