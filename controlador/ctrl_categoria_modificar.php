<?php 
include("../modelo/Categoria.php");

$pk = $_POST['pk'];

$obj = new Categoria();
$datos = $obj->modificar($pk);
$fila=$datos->fetch_assoc();
?>
<div class="container">
    <input type="hidden" id="txt_pk_categoria" value="<?=$fila['pk_categoria']?>">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Categoria:</label>
                <input type="text" value="<?=$fila['categoria']?>" class="form-control text_usuario" id="txt_categoria" placeholder="Categoria">
                <i class="fas fa-bookmark icono_usuario"></i>
            </div>
        </div>
    </div>
</div>