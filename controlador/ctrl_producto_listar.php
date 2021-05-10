<?php 
include("../modelo/Producto.php");

if(isset($_POST['nom'])){
$nombre = $_POST['nom'];
?>

<table  id="tb_lista" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">MARCA</th>
      <th scope="col">PRECIO</th>
      <th scope="col">STOCK</th>
      <th class="th-center" scope="col">FOTO</th>
      <th class="th-center" scope="col">ESTADO</th>
      <th class="th-center" scope="col">ENTRADA</th>
      <th class="th-center" scope="col">SALIDA</th>
    </tr>
  </thead>
  <?php 
  if($nombre == ""){
    $obj = new Producto();
  $datos = $obj->listar();
  $numero = 1;
  while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
  ?>
  <tbody>
    <tr onClick="pasar_pk_registro(<?= $fila['pk_producto'] ?>);ver_detalle();">
      <th scope="row"><?=$numero++?></th>
      <td><?=$fila['nombre']?></td>
      <td><?=$fila['marca']?></td>
      <td><?=$fila['precio']?></td>
      <td class="col_center"><?=$fila['stock']?></td>
      <td class="col_center"><?php if($fila['foto']==""){echo "<i class='fas fa-times foto-false'></i>";}else{echo "<i class='fas fa-check foto-true'></i>";} ?></td>
      <td class="col_center"><?php if($fila['stock']<10){echo "<button class='btn-estado-stock-min'></button>";}else if($fila['stock']<50){echo "<button class='btn-estado-stock-normal'></button>";}else if($fila['stock']>50){echo "<button class='btn-estado-stock-max'></button>";} ?></td>
      <td class="col_center"><button class="btn-entrada-producto" onclick="nuevo_entrada();"><i class="fas fa-plus"></i></button></td>
      <td class="col_center"><button class="btn-salida-producto" onclick="nuevo_salida();"><i class="fas fa-sign-out-alt"></i></button></td>
    </tr>
  </tbody>

  <?php
  }// end while
  ?>
  <?php 
    }else{
  ?>
  <?php
   $obj = new Producto();
   $condicion = "$nombre";
  $datos = $obj->listar($condicion);
  $numero = 1;
  while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
  ?>
  <tbody>
    <tr onClick="pasar_pk_registro(<?= $fila['pk_producto'] ?>);ver_detalle();">
      <th scope="row"><?=$numero++?></th>
      <td><?=$fila['nombre']?></td>
      <td><?=$fila['marca']?></td>
      <td><?=$fila['precio']?></td>
      <td class="col_center"><?=$fila['stock']?></td>
      <td class="col_center"><?php if($fila['foto']==""){echo "<i class='fas fa-times foto-false'></i>";}else{echo "<i class='fas fa-check foto-true'></i>";} ?></td>
      <td class="col_center"><?php if($fila['stock']<10){echo "<button class='btn-estado-stock-min'></button>";}else if($fila['stock']<50){echo "<button class='btn-estado-stock-normal'></button>";}else if($fila['stock']>50){echo "<button class='btn-estado-stock-max'></button>";} ?></td>
      <td class="col_center"><button class="btn-entrada-producto" onclick="nuevo_entrada();"><i class="fas fa-plus"></i></button></td>
      <td class="col_center"><button class="btn-salida-producto" onclick="nuevo_salida();"><i class="fas fa-sign-out-alt"></i></button></td>
    </tr>
  </tbody>

  <?php 
    }//end while
  ?>
  <?php 
    }//end if
  }
  ?>

  
</table>

<script>
 $('#tb_lista tr').click(function(e) {
	 $('#tb_lista tr').removeClass('bgfila'); $(this).toggleClass('bgfila');
 }); 
</script>