<?php
include_once("../modelo/Entrada.php");
$nombre = $_POST['nom'];
$fecha = $_POST['fech'];
?>
<div class="card text-white bg-dark">
    <div class="card-header">
        <h6 class="reporte-salida-titulo">REPORTE ENTRADA</h6>
        <a  href="controlador/ctrl_reporte_entrada_pdf.php?n=<?= $nombre ?>&f=<?= $fecha ?>" target="_blank"><button class="btn-pdf-salida"><i class="fas fa-print"></i> Iprimir reporte</button></a>
        
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">N&deg;</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">MARCA</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">FECHA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($nombre == "") {
                    $obj = new Entrada();
                    $datos = $obj->listar();
                    $numero = 1;
                    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                <tr>
                    <th scope="row"><?= $numero++ ?></th>
                    <td><?= $fila['nombre_e'] ?></td>
                    <td><?= $fila['descripcion'] ?></td>
                    <td><?= $fila['marca'] ?></td>
                    <td><?= $fila['stock'] ?></td>
                    <td><?= $fila['fecha'] ?></td>
                </tr>
                <?php
                    } //fin de while
                    ?>
                <?php
                } else {
                    ?>
                <?php
                    $obj = new Entrada();
                    $condicion = " = '$nombre' and fecha = '$fecha'";
                    $datos = $obj->listar($condicion);
                    $numero = 1;
                    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                <tr>
                    <th scope="row"><?= $numero++ ?></th>
                    <td><?= $fila['nombre_e'] ?></td>
                    <td><?= $fila['descripcion'] ?></td>
                    <td><?= $fila['marca'] ?></td>
                    <td><?= $fila['stock'] ?></td>
                    <td><?= $fila['fecha'] ?></td>
                </tr>
                <?php
                    } //fin de while
                    ?>

                <?php
                } // end if
                ?>
            </tbody>
        </table>
    </div>
</div>