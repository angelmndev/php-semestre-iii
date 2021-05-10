<?php
include("../modelo/Producto.php");
$pk = $_POST['pk'];

$obj = new Producto();
$datos = $obj->modificar($pk);
$fila = $datos->fetch_assoc();
?>

<div class="row">
    <div class="col">
        <form action="">
            <span class="titulo_detalles">Nombre:</span><br>
            <p id="txt_nombre"><i class="fas fa-cube"></i> <?= $fila['nombre'] ?></p>
            <span class="titulo_detalles">Precio:</span><br>
            <p><i class="fas fa-money-bill"></i> <?= $fila['precio'] ?></p>
            <div class="form-group">
                <samp class="titulo_detalles">Cantidad salida:</samp>
                <input type="text" class="form-control text_cantidad_salida" id="txt_cantidad_salida" placeholder="Cantidad salida">
                <i class="fas fa-cubes icono_cantidad_salida"></i>
            </div>

            <div class="form-group">
                <span class="titulo_detalles">Hora:</span>
                <input type="time" class="form-control text_cantidad_salida " id="txt_hora">
                <i class="fas fa-clock  icono_cantidad_salida"></i>
            </div>

    </div>
    <div class="col">
        <span class="titulo_detalles">Marca:</span><br>
        <p><i class="fas fa-marker"></i> <?= $fila['marca'] ?></p>
        <span class="titulo_detalles">Categoria:</span><br>
        <p><i class="fas fa-bookmark"></i> <?= $fila['fk_categoria'] ?></p>
        <span class="titulo_detalles">U-M:</span><br>
        <p id="txt_medida"><i class="fas fa-bookmark"></i> <?= $fila['medida'] ?></p>
        <div class="form-group">
            <span class="titulo_detalles">Fecha:</span>
            <input type="date" class="form-control text_cantidad_salida_fecha" id="txt_fecha">
            <i class="fas fa-calendar-alt icono_cantidad_salida"></i>
        </div>
    </div>
</div>