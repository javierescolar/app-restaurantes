<?php

require_once 'Conexion.php';

class Restaurante {
    
    protected $id;
    protected $cif;
    protected $nombre;
    protected $email;
    protected $telefono;
    
    
    public function __construct($id,$cif,$nombre,$email,$telefono){
        $this->id = $id;
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
    
    public function muestraRestaurantes(){
        
        $bd = BD::getConexion();
        $select = 'SELECT * FROM restaurantes';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'restaurantes');
        $restaurante = $sentencia->fetchAll();
        return $restaurante;
    
    }
    public function getId(){
        return $thisd->id;
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