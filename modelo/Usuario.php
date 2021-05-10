<?php
include_once("Conexion.php");
class Usuario{
//atributos
    private $pk_Usuario;
	private $usuario;
	private $login;
	private $password;
	private $privilegios;
    private $estado;
	
			
//metodos
    //constructor
    public function __construct($usu="",$log="",$pass="",$privi="",$esta=""){
        
		$this->usuario=$usu;
		$this->login=$log;
		$this->password=$pass;
		$this->privilegios=$privi;
		$this->estado=$esta;
				
    }

    public function listar($condicion=""){
		$con=new Conexion();
		if($condicion == ""){
			$sql="select * from usuario";
		}else{
			$sql="select * from usuario where nombre like $condicion ";
		}
       
        $ds=$con->query($sql);

        return $ds;
    }
	
	public function insertar(){
		$con=new Conexion();
		$sql="insert into Usuario (nombre, login, password, privilegios, estado) values('".$this->usuario."','".$this->login."','".$this->password."','".$this->privilegios."','".$this->estado."')";
		$con->query($sql);
	}
	
	public function modificar($pk){
		$con=new Conexion();
        $sql="select * from usuario WHERE pk_usuario='$pk'";
        $ds=$con->query($sql);

        return $ds;		
	}		
	
	public function actualizar($pk){
		$con=new Conexion();
			
		$sql="UPDATE usuario SET ";

		$sql.="nombre='".$this->usuario."',";
		$sql .="login = '".$this->login."',";
		$sql.="password='".$this->password."',";
		$sql.="privilegios='".$this->privilegios."',";
		$sql.="estado='".$this->estado."'";						
		$sql.=" WHERE pk_usuario='$pk'";
		
		$con->query($sql);
	}
	
	
	public function eliminar($pk){
		$con=new Conexion();
		$sql="delete from usuario WHERE pk_usuario='$pk'";
		$con->query($sql);
	}


}
