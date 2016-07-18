<?php

require_once 'Conexion.php';

class Restaurante {
    
    
    protected $cif;
    protected $nombre;
    protected $email;
    protected $telefono;
    
    
    public function __construct($cif,$nombre,$email,$telefono){
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }
    
    public function guardarRestaurante(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO restaurantes(cif,nombre,email,telefono) VALUES ('.$this->cif.','.$this->nombre.','.$this->email.','.$this->telefono.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraRestaurante(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM restaurantes');
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['cif'],$registro['nombre'],$registro['email'],$registro['telefono']);
        }else{
            return false;
        }
    
    }
    
    public function getCif() {
       return $this->cif;
    }
    public function getNombre() {
       return $this->nombre;
    }
    public function getEmail() {
       return $this->email;
    }
    public function getTelefono() {
       return $this->telefono;
    }
    public function setCif($cif) {
       $this->cif = $cif;
    }
    public function setNombre($nombre) {
       $this->nombre = $nombre;
    }
    public function setEmail($email) {
       $this->email = $email;
    }
    public function setTelefono($telefono) {
       $this->telefono = $telefono;
    }
}
?>