<?php 
include_once("../modelo/Categoria.php");
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre:</label>
                <input type="text" class="form-control text_usuario" id="txt_nombre" placeholder="Nombre producto">
                <i class="fas fa-cube icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Descripcion:</label>
                <input type="text" class="form-control text_usuario" id="txt_descripcion" placeholder="Descripcion">
                <i class="fas fa-file-prescription icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Marca:</label>
                <input type="text" class="form-control text_usuario" id="txt_marca" placeholder="Marca del producto">
                <i class="fas fa-tag icono_usuario"></i>

            </div>

            <div class="form-group contenedor_input">
                <label for="">Categoria:</label>
                <select id="cb_categoria" class="form-control cb_usaurio">
                    <?php 
                    $obj = new Categoria();
                    $datos = $obj ->listar();
                    while($fila=$datos->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <option value="<?=$fila['pk_categoria']?>" ><?=$fila['categoria']?></option>
                    <?php
                    }//end while
                    ?>
                </select>
                <i class="fas fa-layer-group icono_usuario"></i>

            </div>

            <div class="form-group contenedor_input">
                <label for="">Unidad de medida:</label>
                <select id="cb_unidad_medida" class="form-control cb_usaurio">
                    <option value="UNIDAD" >UNIDAD</option>
                    <option value="KILOGRAMO" >KILOGRAMO</option>
                    <option value="LITRO" >LITRO</option>
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
                <input type="text" class="form-control text_stock" id="txt_stock" placeholder="Stock del producto">
                <i class="fas fa-money-bill-alt icono_usuario"></i>
            </div>
            
        </div>
    </div>