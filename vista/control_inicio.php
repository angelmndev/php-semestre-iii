<?php
include_once("../modelo/Conexion.php");
$con = new Conexion();

//total de usuarios
$usuario = "SELECT *  FROM usuario";
$ds = $con->query($usuario);
$total_usuario = $ds->num_rows;

//total salida de producto
$salida = "SELECT *  FROM salida";
$ds = $con->query($salida);
$total_salida = $ds->num_rows;

//total entrada de producto
$entrada = "SELECT *  FROM entrada";
$ds = $con->query($entrada);
$total_entrada = $ds->num_rows;

//total categoria
$categoria = "SELECT *  FROM categoria";
$ds = $con->query($categoria);
$total_categoria = $ds->num_rows;

//total usuario
$usuario = "SELECT *  FROM usuario";
$ds = $con->query($usuario);
$total_usuario = $ds->num_rows;

//total de productos
$producto = "SELECT * FROM producto";
$ds = $con->query($producto);
$total_producto=$ds->num_rows;
?>

<div class="container-inicio">
<div class="cuadros_inicio_usuario">
    <p class="titulo_inicio"><i class="fas fa-users icono_inicio"></i> USUARIO</p>
    <p class="cantidad_detalle_inicio"> Total: <?php echo $total_usuario ?></p>
</div>

<div class="cuadros_inicio_salida">
    <p class="titulo_inicio"><i class="fas fa-sign-out-alt icono_inicio"></i> SALIDA</p>
    <p class="cantidad_detalle_inicio"> Total: <?php echo $total_salida?></p>
</div>

<div class="cuadros_inicio_entrada">
    <p class="titulo_inicio"><i class="fas fa-cubes icono_inicio"></i> ENTRADA</p>
    <p class="cantidad_detalle_inicio"> Total: <?php echo $total_entrada ?></p>
</div>

<div class="cuadros_inicio_categoria">
    <p class="titulo_inicio"><i class="fas fa-bookmark icono_inicio"></i> CATEGORIA</p>
    <p class="cantidad_detalle_inicio"> Total: <?php echo $total_categoria ?></p>
</div>

<div class="cuadros_inicio_producto">
    <p class="titulo_inicio"><i class="fas fa-cube icono_inicio"></i> PRODUCTO</p>
    <p class="cantidad_detalle_inicio"> Total: <?php echo $total_producto ?></p>
</div>
</div>


