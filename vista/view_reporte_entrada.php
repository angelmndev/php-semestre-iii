<?php
include("../modelo/Producto.php");
?>
<div class="card bg-dark">
    <div class="card-header">
        <h5 class="titulo-reporte-entrada">REPORTE ENTRADA</h5>
    </div>
    <div class="card-body text-white">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre:</label>
            <input type="text" class="form-control text_usuario" id="txt_nombre_entrada" placeholder="Nombre producto">
            <i class="fas fa-cube icono_usuario"></i>
        </div>

        <div class="form-group contenedor_input">
            <label for="exampleInputEmail1">Fecha:</label>
            <input type="date" class="form-control text_usuario" id="txt_fecha_entrada" >
            <i class="fas fa-file-prescription icono_usuario"></i>
        </div>
      
            <button onclick=" ver_reporte_entrada();" class="form-control contenedor_btn_buscar">BUSCAR</button>

    </div>
</div>