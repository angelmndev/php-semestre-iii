<?php
include("../modelo/Producto.php");

$obj = new Producto();
$datos = $obj->listar();
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre:</label>
                <select class="form-control text_usuario" name="" id="cb_nombre">
                    <?php
                    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                    <option value="<?= $fila['nombre'] ?>"><?= $fila['nombre'] ?></option>
                    <?php
                    } //end while
                    ?>
                </select>
                <i class="fas fa-cube icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Descripcion:</label>
                <input type="text" class="form-control text_usuario" id="txt_descripcion" placeholder="Descripcion">
                <i class="fas fa-file-prescription icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Marca:</label>
                <select class="form-control text_usuario" name="" id="cb_marca">
                    <?php
                    $datos = $obj->listar();
                    while ($filaMarca = $datos->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                    <option value="<?= $filaMarca['marca'] ?>"><?= $filaMarca['marca'] ?></option>

                    <?php
                    } //end while
                    ?>

                </select>
                <i class="fas fa-tag icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="">Categoria:</label>
                <select id="cb_categoria" class="form-control cb_usaurio">
                    <option value="1">TELEVISOR</option>
                </select>
                <i class="fas fa-layer-group icono_usuario"></i>

            </div>


        </div>
        <div class="col">
            <div class="form-group ">
                <label for="">Unidad de medida:</label>
                <select id="cb_unidad_medida" class="form-control cb_usaurio">
                    <option value="1">UNIDAD</option>
                </select>
                <i class="fas fa-weight-hanging icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Precio:</label>
                <input type="text" class="form-control text_usuario" id="txt_precio" placeholder="Precio del producto">
                <i class="fas fa-money-bill-alt icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Stock:</label>
                <input type="text" class="form-control text_usuario" id="txt_stock" placeholder="Stock del producto">
                <i class="fas fa-money-bill-alt icono_usuario"></i>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="form-group contenedor_input">
                        <label for="exampleInputEmail1">Fecha:</label>
                        <input type="date" class="form-control text_usuario" id="txt_fecha">
                        <i class="fas fa-calendar-alt  icono_usuario"></i>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group contenedor_input">
                        <label for="exampleInputEmail1">Hora:</label>
                        <input type="time" class="form-control text_usuario" id="txt_hora">
                        <i class="fas fa-clock  icono_usuario"></i>
                    </div>
                </div>

            </div>

        </div>

    </div>




</div>