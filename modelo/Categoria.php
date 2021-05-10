<?php
include_once("Conexion.php");
class Categoria{
//atributos
    private $pk_categoria;
	private $categoria;
	private $foto;			
//metodos
    //constructor
    public function __construct($cat="",$fot=""){  
		$this->categoria=strtoupper($cat);
		$this->foto=$fot;
    }

    public function listar($condicion=""){
        $con=new Conexion();	
		if($condicion==""){
			$sql="select * from categoria ";
		}else{
			$sql="SELECT * from categoria where categoria like '%$condicion%' ";
		}
        $ds=$con->query($sql);

        return $ds;
	}
	

	public function insertar(){
		$con=new Conexion();
		$sql="insert into categoria (categoria,foto) values ('".$this->categoria."','".$this->foto."')";
		$con->query($sql);
	}
	
	public function modificar($pk){
		$con=new Conexion();
        $sql="select * from categoria WHERE pk_categoria='$pk'";
        $ds=$con->query($sql);

        return $ds;		
	}		
	
	public function actualizar($pk){
		$con=new Conexion();
			
		$sql="UPDATE categoria SET ";

		$sql.="categoria ='".$this->categoria."'";					
		$sql.=" WHERE pk_categoria='$pk'";
		
		$con->query($sql);
	}
	
	
	public function eliminar($pk){
		$con=new Conexion();
		$sql="delete from categoria WHERE pk_categoria ='$pk'";
		$con->query($sql);
	}
		
	public function cargar_foto($pk,$foto){
		$con = new Conexion();
		$sql = "UPDATE categoria  SET foto='$foto' WHERE pk_categoria='$pk' ";
		$con->query($sql);
	}

	public function listar_detalle($pk){
        $con=new Conexion();
        $sql="select * from categoria WHERE pk_categoria='$pk'";
        $ds=$con->query($sql);

        return $ds;
	}
	


}
?>