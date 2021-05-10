<?php 
include("../modelo/Categoria.php");

$pk = $_POST['pk'];

if(isset($_FILES['foto'])){
    $carpeta = '../fotos';
    if(!file_exists($carpeta)){
        mkdir($carpeta);
        @chmod($carpeta, 0777);
    }

    $tmp = $_FILES['foto']['tmp_name'];
    $name = $_FILES['foto']['name'];

    $ahora = time();
    $anombre = explode(".",strtolower($name));
    $extencion = end($anombre);
    $nuevo_nuevo = $ahora.'.'.$extencion;
    $ruta = $carpeta.'/'.$nuevo_nuevo;

    move_uploaded_file($tmp,$ruta);

    $obj = new Categoria();
    $obj->cargar_foto($pk,$nuevo_nuevo);
}else{

}
