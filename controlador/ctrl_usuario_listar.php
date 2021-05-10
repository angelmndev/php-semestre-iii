<?php
include("../modelo/Usuario.php");
//data_default_timezone_set('America/Lima');

if(isset($_POST['nom'])){

  $nombre = $_POST['nom'];
?>


<table id="tb_lista" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">LOGIN</th>
      <th scope="col">ESTADO</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($nombre == ""){
    $obj = new Usuario();
    $datos = $obj->listar();
    $n = 1;
    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
      ?>
    <tr id="tb_lista" onClick="pasar_pk_registro('<?= $fila['pk_usuario'] ?>');ver_detalle();">
      <th scope="row"><?= $n++ ?></th>
      <td><?= $fila['nombre'] ?></td>
      <td><?= $fila['login'] ?></td>
      <td><?php if($fila['estado']=="1"){echo "<button class='estado_activo'>ACTIVO</button>";}else{echo "<button class='estado_inactivo'>INACTIVO</button>";}  ?></td>

    </tr>

    <?php
    } //fin while
    ?>

    <?php
    }else{
    ?>
     <?php
    $obj = new Usuario();
    $condicion = "'%$nombre%'";
    $datos = $obj->listar($condicion);
    $n = 1;
    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
      ?>
    <tr id="tb_lista" onClick="pasar_pk_registro('<?= $fila['pk_usuario'] ?>');ver_detalle();">
      <th scope="row"><?= $n++ ?></th>
      <td><?= $fila['nombre'] ?></td>
      <td><?= $fila['login'] ?></td>
      <td><?php if($fila['estado']=="1"){echo "<button class='estado_activo'>ACTIVO</button>";}else{echo "<button class='estado_inactivo'>INACTIVO</button>";}  ?></td>

    </tr>

    <?php
    } //fin while
    ?>

    <?php
    }//end fin  
    ?>
  </tbody>
</table>


<?php
}//end if
?>
<script>
  $('#tb_lista tr').click(function(e) {
    $('#tb_lista tr').removeClass('bgfila');
    $(this).toggleClass('bgfila');
  });
</script>