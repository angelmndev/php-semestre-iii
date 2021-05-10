<div class="container-fluid">
                
        <div class="row  my-2 py-2">
            <div class="col-md-3">
                <h6 class="text-white header-control-sistema"><i class="fas fa-plus"></i> ENTRADA DE PRODUCTO</h6>
            </div>
            
            <div class="col-md-9">
                <button type="button" onClick="modificar_entrada();" class="btn btn-sm  btn_modificar_sistema"><i class="fas fa-edit"></i> <span class="d-none d-sm-inline">Modificar</span></button>
                <button type="button" onClick="msg_eliminar_entrada();" class="btn btn-sm  btn_eliminar_sistema"><i class="fas fa-trash"></i> <span class="d-none d-sm-inline">Eliminar</span></button>                       
                <input type="hidden" id="txt_pk_registro">
                
                <input type="hidden" id="txt_pk_registro">
                
                <button type="button" onclick="filtrar_entrada();" class="btn btn-sm btn-primary float-right">Buscar</button>
                <input type="text" id="txt_buscar_entrada" class="form-control-sm float-right" placeholder="Buscar">
                
            </div>
            
        </div>
        
        <div class="row ">
            <div id="ct_datos" class="col p-0">
                <!--tabla-->
                    
                <!--tabla-->                            
            </div>
        </div>
</div>