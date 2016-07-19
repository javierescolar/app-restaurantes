<?php

require_once 'Conexion.php';

class Perfil extends Restaurante{
    
    
    private nombre;
    
   public function __construct($nombre){
       
       $this->nombre=$nombre;
   }
   
   public function guardaPerfil(){
       $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO perfiles(nombre) VALUES ('.$this->nombre.')');
        $consulta->execute();
        $conexion = null;
   }
   
}
?>