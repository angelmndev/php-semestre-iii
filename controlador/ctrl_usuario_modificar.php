<?php
include("../modelo/Usuario.php");
$obj = new Usuario();

$pk = $_POST['pk'];
$datos = $obj->modificar($pk);
$fila = $datos->fetch_assoc();
?>
<div class="container">
    <div class="row">
        <div class="col">

            <input type="hidden" id="txt_pk_usuario" value="<?=$fila['pk_usuario']?>" >

            <input type="hidden" id="txt_password_db" value="<?=$fila['password']?>" >

            <div class="form-group">
                <label for="exampleInputEmail1">Usuario:</label>
                <input type="text" value="<?= $fila['usuario'] ?>" class="form-control text_usuario" id="txt_usuario" aria-describedby="emailHelp" placeholder="Nombre usuario">
                <i class="fas fa-user icono_usuario"></i>
            </div>

            <div class="form-group contenedor_login">
                <label for="exampleInputEmail1">Login:</label>
                <input type="text" value="<?= $fila['login'] ?>" class="form-control text_usuario" id="txt_login" aria-describedby="emailHelp" placeholder="Login">
                <i class="fas fa-user icono_usuario"></i>
            </div>

            <div class="form-group contenedor_login">
                <label for="exampleInputEmail1">Password Actual:</label>
                <input type="password" class="form-control text_usuario" id="txt_password" aria-describedby="emailHelp" placeholder="Password Actual">
                <i class="fas fa-key icono_usuario"></i>

            </div>
                
            <div class="form-group contenedor_login">
                <label for="exampleInputEmail1">Password Nuevo:</label>
                <input type="password" class="form-control text_usuario" id="txt_password_2" aria-describedby="emailHelp" placeholder="Password Nuevo">
                <i class="fas fa-key icono_usuario"></i>

            </div>

            <div class="form-group form-check contenedor_login ">
                <input type="checkbox" class="form-check-input" id="show_password">
                <label class="form-check-label" for="exampleCheck1">Mostrar password</label>
            </div>



            <div class="form-group contenedor_login">
                <div class="form-row align-items-center">
                    <div class="col-auto my-3">
                        <label class="" for="inlineFormCustomSelect">Estado:</label>
                        <select class="custom-select mr-md-2" id="cb_estado">
                            <option <?php if ($fila['estado'] == "1") {
                                        echo "selected";
                                    }  ?> value="1">ACTIVO</option>
                            <option <?php if ($fila['estado'] == "0") {
                                        echo "selected";
                                    }  ?> value="0">INACTIVO</option>
                        </select>
                    </div>

                </div>
            </div>

        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4>Privilegios</h4>
                </div>
                <?php
                $pri = preg_split("[,]", $fila['privilegios']);
                ?>

                <div class="card-body">
                    <div class="form-group form-check">
                        <input <?php if ($pri[0] == "1") {
                                    echo "checked";
                                } ?> type="checkbox" class="form-check-input" id="chk_control_postulante">
                        <label class="form-check-label" for="exampleCheck1">Control Postulante</label>
                    </div>

                    <div class="form-group form-check">
                        <input <?php if ($pri[1] == "1") {
                                    echo "checked";
                                } ?> type="checkbox" class="form-check-input" id="chk_control_carrera">
                        <label class="form-check-label" for="exampleCheck1">Control Carrera</label>
                    </div>

                    <div class="form-group form-check">
                        <input <?php if ($pri[2] == "1") {
                                    echo "checked";
                                } ?> type="checkbox" class="form-check-input" id="chk_control_usuario">
                        <label class="form-check-label" for="exampleCheck1">Control Usuario</label>
                    </div>

                    <div class="form-group form-check">
                        <input <?php if ($pri[3] == "1") {
                                    echo "checked";
                                } ?> type="checkbox" class="form-check-input" id="chk_control_reporte">
                        <label class="form-check-label" for="exampleCheck1">Control Reporte</label>
                    </div>
                </div>

            </div>

<script src="recursos/js/sistema.js"></script>

        </div>
    </div>