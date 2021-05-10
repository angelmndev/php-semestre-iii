<?php
include_once("../modelo/Salida.php");
include_once("../modelo/Producto.php");

$pk = $_POST['pk'];

//jalando datos
$obj = new Producto();
$datos = $obj->modificar($pk);
$fila = $datos->fetch_assoc();

$stock = $fila['stock'];
$cantidad = $_POST['cant'];

$stock_total = $stock - $cantidad;

if ($stock > $cantidad) {

    //datos 
    $nombre = $fila['nombre'];
    $descripcion = $fila['descripcion'];
    $marca = $fila['marca'];
    $precio = $fila['precio'];
    $stock = $cantidad;
    $foto = $fila['foto'];
    $fk_categoria = $fila['fk_categoria'];
    $fk_medida = $fila['medida'];
    $fecha = $_POST['fech'];
    $hora = $_POST['hor'];

    //guardando datos en la tabla salida
    $objSalida = new Salida($nombre, $descripcion, $marca, $precio, $cantidad, $foto, $fk_categoria, $fk_medida, $fecha, $hora);
    $objSalida->insertar();
    //actualizando tabla en producto
    $objActualizar = new Producto($nombre, $descripcion, $marca, $precio, $stock_total, $foto, $fk_categoria, $fk_medida);
    $objActualizar->actualizar($pk);
}else{
    echo "0";
}