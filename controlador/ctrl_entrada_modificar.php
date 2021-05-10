<?php 
include("../modelo/Entrada.php");

$pk = $_POST['pk'];

$obj = new Entrada();
$datos = $obj->modificar($pk);
$fila=$datos->fetch_assoc();
?>
<div class="container">
    <div class="row">
        <div class="col">
            <input type="hidden" id="txt_pk_salida" value="<?=$fila['pk_entrada']?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre:</label>
                <input type="text" value="<?=$fila['nombre']?>" class="form-control text_usuario" id="txt_nombre" placeholder="Nombre producto">
                <i class="fas fa-cube icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Descripcion:</label>
                <input type="text" value="<?=$fila['descripcion']?>" class="form-control text_usuario" id="txt_descripcion" placeholder="Descripcion">
                <i class="fas fa-file-prescription icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Marca:</label>
                <input type="text"  value="<?=$fila['marca']?>" class="form-control text_usuario" id="txt_marca" placeholder="Marca del producto">
                <i class="fas fa-tag icono_usuario"></i>

            </div>

            <div class="form-group contenedor_input">
                <label for="">Categoria:</label>
                <select id="cb_categoria" class="form-control cb_usaurio">
                    <option value="1" >TELEVISOR</option>
                </select>
                <i class="fas fa-layer-group icono_usuario"></i>

            </div>

            <div class="form-group contenedor_input">
                <label for="">Unidad de medida:</label>
                <select id="cb_unidad_medida" class="form-control cb_usaurio">
                    <option value="1" >UNIDAD</option>
                </select>
                <i class="fas fa-weight-hanging icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Precio:</label>
                <input type="text"  value="<?=$fila['precio']?>" class="form-control text_usuario" id="txt_precio" placeholder="Precio del producto">
                <i class="fas fa-money-bill-alt icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Stock:</label>
                <input type="text"  value="<?=$fila['stock']?>" class="form-control  text_usuario" id="txt_stock" placeholder="Stock del producto">
                <i class="fas fa-money-bill-alt icono_usuario"></i>
            </div>
            
        </div>
    </div>