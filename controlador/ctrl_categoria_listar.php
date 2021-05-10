<?php 
include("../modelo/Categoria.php");

if(isset($_POST['nom'])){

  $categoria = $_POST['nom'];
?>

<table  id="tb_lista" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CATEGORIA</th>
      <th class="th-center" scope="col">FOTO</th>
    </tr>
  </thead>
  <?php 
  if($categoria == ""){
  $obj = new Categoria();
  $datos = $obj->listar();
  $numero = 1;
  while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
  ?>
  <tbody>
    <tr onClick="pasar_pk_registro(<?= $fila['pk_categoria'] ?>);ver_detalle_categoria();">
      <th scope="row"><?=$numero++?></th>
      <td><?=$fila['categoria']?></td>
      <td class="col_center"><?php if($fila['foto']==""){echo "<button class='btn-sin-foto' onclick='seleccionar_foto_categoria();'><i class='fas fa-cloud-upload-alt'></i></button>";}else{echo "<button class='btn-con-foto'><i class='fas fa-image'></i></button>";} ?></td>
    </tr>
  </tbody>

  <?php
  }// end while
  ?>
  <?php
  }else{
  ?>

  <?php
  $obj = new Categoria();
  $condicion = "$categoria";
  $datos = $obj->listar($condicion);
  $numero = 1;
  while($fila = $datos->fetch_array(MYSQLI_ASSOC)){
  ?>
  <tbody>
    <tr onClick="pasar_pk_registro(<?= $fila['pk_categoria'] ?>);ver_detalle_categoria();">
      <th scope="row"><?=$numero++?></th>
      <td><?=$fila['categoria']?></td>
      <td class="col_center"><?php if($fila['foto']==""){echo "<button class='btn-sin-foto' onclick='seleccionar_foto_categoria();'><i class='fas fa-cloud-upload-alt'></i></button>";}else{echo "<button class='btn-con-foto'><i class='fas fa-image'></i></button>";} ?></td>
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
  }// end if isset
?>
<script>
 $('#tb_lista tr').click(function(e) {
	 $('#tb_lista tr').removeClass('bgfila'); $(this).toggleClass('bgfila');
 }); 
</script>