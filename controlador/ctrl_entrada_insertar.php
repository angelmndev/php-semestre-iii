<?php 
include("../modelo/Entrada.php");
include("../modelo/Producto.php");

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

$obj = new Entrada($nombre,$descripcion,$marca,$precio,$stock,$foto,$fk_categoria,$fk_unidad,$fecha,$hora);
$obj->insertar();

//jalando datos
$objProducto = new Producto();
$datos = $objProducto->modificar($nombre);
$fila = $datos->fetch_assoc();

$stock_producto = $fila['stock'];

$stock_total = $stock + $stock_producto;



//actualizando datos de producto
$objActualizar = new Producto();
$objActualizar->cargar_stock($nombre,$stock_total)
?>