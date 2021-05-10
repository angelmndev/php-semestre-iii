<?php
include("../modelo/Usuario.php");

$pk_usuario = $_POST['pk'];

$obj = new Usuario();
$obj->eliminar($pk_usuario);

?>