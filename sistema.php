<?php
session_start();
if (isset($_SESSION['login'])) { } else {
    header("location:index.php");
}
if ($_SESSION['estado'] == "1") { } else {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="recursos/js/jquery-3.4.1.min.js"></script>
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
    <script src="recursos/js/bootstrap.min.js"></script>
    <script src="recursos/js/all.js"></script>

    <link href="recursos/css/estilo.css" rel="stylesheet">

    <link href="recursos/css/mk-notifications.min.css" rel="stylesheet">
    <script src="recursos/js/mk-notifications.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Cuprum:400,400i,700,700i&display=swap|Ubuntu+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/cavecera.css">
    <title>APP ALMACEN</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row ct_cavecera">

            <div class="col-1.5 pl-4 mt-2">
                <img class="banner-sistem" src="recursos/images/banner-2.png" alt="">
            </div>

            <div class="col text-left text-white  mt-3">
                <button class="btn-activo">ACTIVO</button>
            </div>

            <div class="col-5 text-right py-3">
                <i class="fas fa-user icono-principal-user"></i>
                <span class="usuario_de_sistema"><?=$_SESSION['login']?></span>
                <a href="cerrar_sesion.php"><button class="btn-cerrar-sesion">cerrar sesion</button></a>
            </div>

        </div>
        <div class="row">
            <div class="barra-lateral">
            <?php
                include("vista/view_header.php");
                ?>
            </div>
            <div class="ct_principal">
                <div class="row">
                    <div class="col" id="ct_principal">


                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php
    include_once("vista/view_modal.php");
    ?>

    <script src="recursos/js/estilo_header.js"></script>
    <script src="controlador/js/ctrl_inicio.js"></script>
    <script src="controlador/js/ctrl_producto.js"></script>
    <script src="controlador/js/ctrl_salida.js"></script>
    <script src="controlador/js/ctrl_entrada.js"></script>
    <script src="controlador/js/ctrl_reporte.js"></script>
    <script src="controlador/js/ctrl_usuario.js"></script>
    <script src="controlador/js/ctrl_categoria.js"></script>
    <script src="recursos/js/sistema.js"></script>
</body>

</html>