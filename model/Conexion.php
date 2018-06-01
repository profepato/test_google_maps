<?php
class Conexion{
    
    public function conectar(){
        $this->mysql = new mysqli(
            "localhost",
            "root",
            "",
            "bd_lugares"
        );
        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }
    
    public function ejecutar($query){
        return $this->mysql->query($query);
    }
    
    public function desconectar(){
        $this->mysql->close();
    }
}