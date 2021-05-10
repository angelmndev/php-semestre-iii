<div class="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario:</label>
                <input type="text" class="form-control text_usuario" id="txt_usuario" aria-describedby="emailHelp" placeholder="Nombre usuario">
                <i class="fas fa-user icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Login:</label>
                <input type="text" class="form-control text_usuario" id="txt_login" aria-describedby="emailHelp" placeholder="Login">
                <i class="fas fa-user icono_usuario"></i>
            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Password:</label>
                <input type="password" class="form-control text_usuario" id="txt_password" aria-describedby="emailHelp" placeholder="Password">
                <i class="fas fa-key icono_usuario"></i>

            </div>

            <div class="form-group contenedor_input">
                <label for="exampleInputEmail1">Password:</label>
                <input type="password" class="form-control text_usuario" id="txt_password_2" aria-describedby="emailHelp" placeholder="Repita Password">
                <i class="fas fa-key icono_usuario"></i>
            </div>

            <div class="form-group form-check contenedor_input ">
                <input type="checkbox" class="form-check-input" id="show_password">
                <label class="form-check-label" for="exampleCheck1">Mostrar password</label>
            </div>


            <div class="form-group contenedor_input_final">
            <div class="form-row align-items-center">
                <div class="col-auto my-3">
                    <label class="" for="inlineFormCustomSelect">Estado:</label>
                    <select class="custom-select mr-md-2" id="cb_estado">
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                </div>

            </div>
            </div>

        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Privilegios</h4>
                </div>
                <div class="card-body">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="chk_control_postulante">
                        <label class="form-check-label" for="exampleCheck1">Control Almacen</label>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="chk_control_carrera">
                        <label class="form-check-label" for="exampleCheck1">Control Producto</label>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="chk_control_usuario">
                        <label class="form-check-label" for="exampleCheck1">Control Usuario</label>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="chk_control_reporte">
                        <label class="form-check-label" for="exampleCheck1">Control Reporte</label>
                    </div>
                </div>

            </div>
        </div>
    </div>