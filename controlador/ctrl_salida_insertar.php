<?php 
include("../modelo/Salida.php");

$nombre = $_POST['nom'];
$descripcion = $_POST['des'];
$marca = $_POST['marc'];
$precio = $_POST['pre'];
$stock = $_POST['stk'];
$foto = $_POST['fot'];
$fk_categoria = $_POST['fk_cat'];
$fk_unidad = $_POST['fk_un'];
$fecha = $_POST['fech'];
$hora = $_POST['hor'];

$obj = new Salida($nombre,$descripcion,$marca,$precio,$stock,$foto,$fk_categoria,$fk_unidad,$fecha,$hora);
$obj->insertar();

?>