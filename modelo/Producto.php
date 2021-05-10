<?php
include_once("Conexion.php");
class Producto{
//atributos
    private $pk_producto;
	private $nombre;
	private $descripcion;
	private $marca;
	private $precio;
	private $stock;
	private $foto;
	private $fk_categoria;
	private $unidad;
			
//metodos
    //constructor
    public function __construct($nom="",$des="",$marc="",$prec="",$st="",$fot="",$fk_cat="",$uni=""){  
		$this->nombre=strtoupper($nom);
		$this->descripcion=strtoupper($des);
		$this->marca=strtoupper($marc);
		$this->precio=$prec;				
		$this->stock=$st;
		$this->foto=$fot;
		$this->fk_categoria=$fk_cat;
		$this->unidad=$uni;
    }

    public function listar($condicion=""){
        $con=new Conexion();	
		if($condicion==""){
			$sql="select * from producto ";
		}else{
			$sql="SELECT * from producto where nombre like '%$condicion%'";
		}
        $ds=$con->query($sql);

        return $ds;
	}
	

	public function insertar(){
		$con=new Conexion();
		$sql="insert into producto (nombre, descripcion, marca, precio, stock, foto, fk_categoria, medida) values ('".$this->nombre."','".$this->descripcion."','".$this->marca."','".$this->precio."','".$this->stock."','".$this->foto."','".$this->fk_categoria."','".$this->unidad."')";
		$con->query($sql);
	}
	
	public function modificar($pk){
		$con=new Conexion();
        $sql="select * from producto WHERE pk_producto='$pk'";
        $ds=$con->query($sql);

        return $ds;		
	}		
	
	public function actualizar($pk){
		$con=new Conexion();
			
		$sql="UPDATE producto SET ";

		$sql.="nombre ='".$this->nombre."',";
		$sql .="descripcion = '".$this->descripcion."',";
		$sql.="marca='".$this->marca."',";
		$sql.="precio ='".$this->precio."',";
		$sql.="stock ='".$this->stock."',";
		//$sql.="foto ='".$this->foto."',";
		$sql.="fk_categoria ='".$this->fk_categoria."',";
		$sql.="medida ='".$this->unidad."'";						
		$sql.=" WHERE pk_producto='$pk'";
		
		$con->query($sql);
	}
	
	
	public function eliminar($pk){
		$con=new Conexion();
		$sql="delete from producto WHERE pk_producto ='$pk'";
		$con->query($sql);
	}
		
	public function cargar_foto($pk,$foto){
		$con = new Conexion();
		$sql = "UPDATE producto  SET foto='$foto' WHERE pk_producto='$pk' ";
		$con->query($sql);
	}

	public function listar_detalle($pk){
        $con=new Conexion();
        $sql="select  nombre,descripcion,marca,precio,stock,producto.foto,categoria from  producto inner join categoria on fk_categoria=pk_categoria WHERE pk_producto='$pk'";
        $ds=$con->query($sql);

        return $ds;
	}

	public function cargar_stock($pk,$stock){
		$con = new Conexion();
		$sql = "UPDATE producto  SET stock='$stock' WHERE pk_producto='$pk' ";
		$con->query($sql);
	}
	


}
?>