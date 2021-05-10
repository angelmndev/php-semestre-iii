<?php 
include("../modelo/Entrada.php");

if(isset($_POST['nom'])){
  $nombre = $_POST['nom'];
?>

<table  id="tb_lista" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">MARCA</th>
      <th scope="col">FECHA</th>
      <th scope="col">STOCK</th>
      <th class="th-center" scope="col">DETALLE</th>
    </tr>
  </thead>
  <?php 
  if($nombre == ""){
  $obj = new Entrada();
  $datos = $obj->listar();
  $numero = 1;
  while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
  ?>
  <tbody>
    <tr onClick="pasar_pk_registro(<?= $fila['pk_entrada'] ?>);ver_detalle();">
      <th scope="row"><?=$numero++?></th>
      <td><?=$fila['nombre_e']?></td>
      <td><?=$fila['descripcion']?></td>
      <td><?=$fila['marca']?></td>
      <td><?=$fila['fecha']?></td>
      <td><?=$fila['stock']?></td>
      <td class="col_center"><button class="btn-detalle-entrada" onclick="ver_detalle_entrada();"><i class="fas fa-eye"></i></button></td>
    </tr>
  </tbody>

  <?php
  }// end while
  ?>

  <?php
  }else{
  ?>
  <?php 
  $obj = new Entrada();
  $condicion = "like '%$nombre%'";
  $datos = $obj->listar($condicion);
  $numero = 1;
  while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
  ?>
  <tbody>
    <tr onClick="pasar_pk_registro(<?= $fila['pk_entrada'] ?>);ver_detalle();">
      <th scope="row"><?=$numero++?></th>
      <td><?=$fila['nombre_e']?></td>
      <td><?=$fila['descripcion']?></td>
      <td><?=$fila['marca']?></td>
      <td><?=$fila['fecha']?></td>
      <td><?=$fila['stock']?></td>
      <td class="col_center"><button class="btn-detalle-entrada" onclick="ver_detalle_entrada();"><i class="fas fa-eye"></i></button></td>
    </tr>
  </tbody>

  <?php
  }// end while
  ?>




  <?php
  }//end if
  ?>
</table>


<?php
}// end if
?>
<script>
 $('#tb_lista tr').click(function(e) {
	 $('#tb_lista tr').removeClass('bgfila'); $(this).toggleClass('bgfila');
 }); 
</script>