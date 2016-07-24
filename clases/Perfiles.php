<?php

require_once 'BD.php';

class Perfil extends Restaurante{
    
    
    protected $idPerfil;
    protected $nombre;
    
   public function __construct($id,$nombre){
       $this->idPerfil=$id;
       $this->nombre= $nombre;
   }
   
   public function guardaPerfil(){
       $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO perfiles(nombre) VALUES ('.$this->nombre.')');
        $consulta->execute();
        $conexion = null;
   }
   
   public function cargarPerfil($idPerfil){
       $conexion = BD::getConexion();
       $consulta = $conexion->prepare('SELECT * FROM perfiles WHERE idPerfil = :perfil');
       $consulta->execute([":perfil" => $idPerfil]);
       $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'perfiles');
       $perfil = $consulta->fetch();
       return $perfil;
      
   }
   
   function getIdPerfil() {
       return $this->idPerfil;
   }

   function getNombre() {
       return $this->nombre;
   }

   function setIdPerfil($idPerfil) {
       $this->idPerfil = $idPerfil;
   }

   function setNombre($nombre) {
       $this->nombre = $nombre;
   }


   
}
?>