<?php
include("../modelo/Producto.php");

$pk = $_POST['pk'];

$obj = new Producto();
$datos = $obj->listar_detalle($pk);
$fila = $datos->fetch_assoc();
?>
<div class="card text-white bg-dark  mb-3" style="">
    <div class="card-header">DATOS DEL PRODUCTO</div>
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
                        <button class="btn-seleccionar-foto" onclick="seleccionar_foto();">Cargar</button> <br>
                    </div>
                </div>

                <div class="row">
                    <form class="was-validated">
                        <div class="mb-3 text-center">
                            <label class="titulo_detalles_textarea" for="validationTextarea">Descripcion:</label>
                            <textarea class="form-control textarea_descripcion" value="" id="validationTextarea" placeholder="Descripcion..." required><?=$fila['descripcion']?></textarea>
                        </div>
                </div>

            </div>
            <!-- detalles del producto -->
            <div class="col">
                <span class="titulo_detalles">Nombre:</span>
                <p> <i class="fas fa-cube"></i> <?= $fila['nombre'] ?></p>
                <span class="titulo_detalles">Marca:</span>
                <p><i class="fas fa-marker"></i> <?= $fila['marca'] ?></p>
                <span class="titulo_detalles">Precio:</span>
                <p><i class="fas fa-money-bill"></i> <?= $fila['precio'] ?></p>
                <span class="titulo_detalles">Stock:</span>
                <p> <i class="fas fa-tag"></i> <?= $fila['stock'] ?></p>
                <span class="titulo_detalles">Categoria:</span>
                <p><i class="fas fa-bookmark"></i> <?= $fila['categoria'] ?></p>
            </div>
        </div>
    </div>
</div>