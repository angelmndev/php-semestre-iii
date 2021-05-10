<div class="container-fluid">
                
        <div class="row  my-2 py-2">
            <div class="col-md-2">
                <h6 class="text-white header-control-sistema"><i class="fas fa-bookmark"></i> CATEGORIA</h6>
            </div>
            
            <div class="col-md-10">
                <button type="button" onClick="nuevo_categoria();" class="btn btn-sm  btn_nuevo_sistema"><i class="fas fa-file"></i> <span class="d-none d-sm-inline">Nuevo</span></button>
                <button type="button" onClick="modificar_categoria();" class="btn btn-sm  btn_modificar_sistema"><i class="fas fa-edit"></i> <span class="d-none d-sm-inline">Modificar</span></button>
                <button type="button" onClick="msg_eliminar_categoria();" class="btn btn-sm  btn_eliminar_sistema"><i class="fas fa-trash"></i> <span class="d-none d-sm-inline">Eliminar</span></button>                       
                <input type="hidden" id="txt_pk_registro">
                
                <input type="hidden" id="txt_pk_registro">
                
                <button type="button" onclick="filtrar_categoria();" class="btn btn-sm btn-primary float-right">Buscar</button>
                <input type="text" id="txt_nombre_categoria" class="form-control-sm float-right" placeholder="Buscar">
                
            </div>
            
        </div>
        
        <div class="row ">
            <div id="ct_datos" class="col-8 p-0">
                <!--tabla-->
                    
                <!--tabla-->                            
            </div>

            <div class="col-4 pr-1" id="ct_detalle">
                <!-- detalle -->

                <!-- detalle -->
            </div>
        </div>
</div>