<?php
include_once("modelo/Conexion.php");
$con = new Conexion();

$user = $_POST['txt_usuario'];
$pass = $_POST['txt_password'];

$password = sha1($pass);

$sql = "SELECT *  FROM usuario WHERE login ='$user' and password = '$password'";
$ds = $con->query($sql);

$total_registro = $ds->num_rows;

if($total_registro > 0){
    
    $fila = $ds->fetch_array(MYSQLI_ASSOC);

    session_start();

    $_SESSION['login'] = $user;
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['privilegios'] = $fila['privilegios'];
    $_SESSION['estado'] = $fila['estado'];
    header("location:sistema.php");

}else{
   
    header("location: index.php");
}


?>