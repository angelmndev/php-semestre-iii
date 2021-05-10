<?php
include("../modelo/Usuario.php");

$usuario = $_POST['usu'];
$login = $_POST['log'];
$password = sha1($_POST['pass']);

$estado  = $_POST['esta'];

$p_pos = $_POST['p-p'];
$p_car = $_POST['p-c'];
$p_usu = $_POST['p-u'];
$p_rep = $_POST['p-r'];
$privilegios = $p_pos.",".$p_car.",".$p_usu.",".$p_rep;

echo $usuario.'-'.$login.'-'.$password.'-'.$privilegios;
	
$obj= new Usuario($usuario,$login,$password,$privilegios,$estado);
$obj->insertar();


?>