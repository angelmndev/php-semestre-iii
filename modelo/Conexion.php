<?php
class Conexion extends mysqli{
    private $server="localhost";
    private $user="root";
    private $password="";
    private $database="dbmigue";

    public function __construct(){
        parent:: __construct($this->server, $this->user, $this->password, $this->database);
        
    }
}
?>