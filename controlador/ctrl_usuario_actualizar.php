<?php
include("../modelo/Usuario.php");

$pk_usuario = $_POST['pk'];

//comparando las contraseñas
$pass_db = $_POST['pass_db'];

$pass_actual = $_POST['pass'];
$pass_nuevo = $_POST['pass_2'];

$passwordN = sha1($pass_nuevo);
$passwordA = sha1($pass_actual);



$usuario = $_POST['usu'];
$login = $_POST['log'];
$estado  = $_POST['esta'];

$p_pos = $_POST['p-p'];
$p_car = $_POST['p-c'];
$p_usu = $_POST['p-u'];
$p_rep = $_POST['p-r'];
$privilegios = $p_pos.",".$p_car.",".$p_usu.",".$p_rep;

if ($pass_db == $passwordA){
    $obj = new Usuario($usuario, $login, $passwordN, $privilegios, $estado);
    $obj->actualizar($pk_usuario);
}else{
     echo "0";
}
