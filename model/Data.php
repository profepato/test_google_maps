<?php
require_once("Conexion.php");

class Data{
    private $con;
    
    public function __construct(){
        $this->con = new Conexion();
    }
    
    public function addLugar($latitud, $longitud, $titulo, $info){
        $this->con->conectar();
        $this->con->ejecutar("INSERT INTO lugar VALUES(NULL, '$latitud','$longitud','$titulo','$info');");
        $this->con->desconectar();
    }
    
}