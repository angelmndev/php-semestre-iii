<?php
include("../modelo/Entrada.php");

$pk = $_POST['pk'];

$obj = new Entrada();
$datos = $obj->listar_detalle($pk);
$fila = $datos->fetch_assoc();
?>
<div class="card " style="">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col text-center ">
                        <img class="foto_producto" <?php if ($fila['foto'] == "") {
                                                        $foto =  "foto.png";
                                                    } else {
                                                        $foto = $fila['foto'];
                                                    }
                                                    ?> class="foto_perfil" src="./fotos/<?php echo $foto ?>" alt="">
                    </div>
                </div>

                <!-- boton para cambiar la foto -->
                <div class="row">
                    <div class="col text-center py-2">
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="titulo_detalles">Fecha:</span>
                        <p> <i class="fas fa-calendar-alt"></i> <?= $fila['fecha'] ?></p>
                        <span class="titulo_detalles">Hora:</span>
                        <p> <i class="fas fa-clock"></i> <?= $fila['hora'] ?></p>

                    </div>
                </div>

            </div>
            <!-- detalles del producto -->
            <div class="col">
                <span class="titulo_detalles">Nombre:</span>
                <p> <i class="fas fa-cube"></i> <?= $fila['nombre_e'] ?></p>
                <span class="titulo_detalles">Marca:</span>
                <p><i class="fas fa-marker"></i> <?= $fila['marca'] ?></p>
                <span class="titulo_detalles">Precio:</span>
                <p><i class="fas fa-money-bill"></i> <?= $fila['precio'] ?></p>
                <span class="titulo_detalles">Stock:</span>
                <p> <i class="fas fa-tag"></i> <?= $fila['stock'] ?></p>
                <span class="titulo_detalles">Categoria:</span>
                <p><i class="fas fa-bookmark"></i> <?= $fila['fk_categoria'] ?></p>
            </div>
        </div>
    </div>
</div>