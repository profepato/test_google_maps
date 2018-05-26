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
    
    public function getLugares(){
        $this->con->conectar();
        
        $lugares = array();
        
        $rs = $this->con->ejecutar("SELECT * FROM lugar");
        
        while($obj = $rs->fetch_object()){
            array_push($lugares, $obj);
        }
        
        $this->con->desconectar();
        
        return $lugares;
    }
    
}