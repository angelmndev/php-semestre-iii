<?php
include("../modelo/Categoria.php");

$pk = $_POST['pk'];

$obj = new Categoria();
$datos = $obj->listar_detalle($pk);
$fila = $datos->fetch_assoc();
?>
<div class="card text-white bg-dark  mb-3" style="">
    <div class="card-header">DATOS DE CATEGORIA</div>
    <div class="card-body">
        <!-- detalles del categoria -->
        <div class="row">
            <div class="col text-center">
            <img class="foto_perfil_categoria" <?php if ($fila['foto'] == "") {
                                                        $foto =  "foto.png";
                                                    } else {
                                                        $foto = $fila['foto'];
                                                    }
                                                    ?>  src="./fotos/<?php echo $foto ?>" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <span class="titulo_detalles">Categoria:</span>
                <p><i class="fas fa-bookmark"></i> <?= $fila['categoria'] ?></p>
            </div>
        </div>
    </div>
</div>