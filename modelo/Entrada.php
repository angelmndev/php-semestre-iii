<?php
include_once("Conexion.php");
class Entrada{
//atributos
    private $pk_entrada;
	private $nombre;
	private $descripcion;
	private $marca;
	private $precio;
	private $stock;
	private $foto;
	private $fk_categoria;
	private $fk_unidad;
	private $fecha;
	private $hora;
			
//metodos
    //constructor
    public function __construct($nom="",$des="",$marc="",$prec="",$st="",$fot="",$fk_cat="",$fk_uni="",$fech="",$hor=""){
        
		$this->nombre= strtoupper($nom);
		$this->descripcion=strtoupper($des);
		$this->marca=strtoupper($marc);
		$this->precio=$prec;				
		$this->stock=$st;
		$this->foto=$fot;
		$this->fk_categoria=$fk_cat;
		$this->fk_unidad=$fk_uni;
		$this->fecha=$fech;
		$this->hora=$hor;
    }

    public function listar($condicion=""){
        $con=new Conexion();	
		if($condicion==""){
			$sql="SELECT * FROM entrada";
		}else{
			$sql="SELECT * from entrada where nombre_e $condicion";
		}
        $ds=$con->query($sql);

        return $ds;
	}
	

	public function insertar(){
		$con=new Conexion();
		$sql="insert into entrada (nombre_e, descripcion, marca, precio, stock, foto, fk_categoria, fk_medida, fecha, hora) values ('".$this->nombre."','".$this->descripcion."','".$this->marca."','".$this->precio."','".$this->stock."','".$this->foto."','".$this->fk_categoria."','".$this->fk_unidad."','".$this->fecha."','".$this->hora."')";
		$con->query($sql);
	}
	
	public function modificar($pk){
		$con=new Conexion();
        $sql="select * from entrada WHERE pk_entrada='$pk'";
        $ds=$con->query($sql);

        return $ds;		
	}		
	
	public function actualizar($pk){
		$con=new Conexion();
			
		$sql="UPDATE entrada SET ";

		$sql.="nombre_e ='".$this->nombre."',";
		$sql .="descripcion = '".$this->descripcion."',";
		$sql.="marca='".$this->marca."',";
		$sql.="precio ='".$this->precio."',";
		$sql.="stock ='".$this->stock."',";
		//$sql.="foto ='".$this->foto."',";
		$sql.="fk_categoria ='".$this->fk_categoria."',";
		$sql.="fk_medida ='".$this->fk_unidad."',";
		$sql.="fecha ='".$this->fecha."',";
		$sql.="hora ='".$this->hora."' ";						
		$sql.=" WHERE pk_entrada='$pk'";
		
		$con->query($sql);
	}
	
	
	public function eliminar($pk){
		$con=new Conexion();
		$sql="delete from entrada WHERE pk_entrada ='$pk'";
		$con->query($sql);
	}
		
	public function cargar_foto($pk,$foto){
		$con = new Conexion();
		$sql = "UPDATE entrada  SET foto='$foto' WHERE pk_entrada='$pk' ";
		$con->query($sql);
	}

	public function listar_detalle($pk){
        $con=new Conexion();
        $sql="select * from entrada WHERE pk_entrada='$pk'";
        $ds=$con->query($sql);

        return $ds;
	}



}
?>