<?php

require_once 'BD.php';

class Restaurante {
    
    protected $id;
    protected $cif;
    protected $nombre;
    protected $email;
    protected $telefono;
    protected $estiloCSS;
    protected $logo;
    protected $mesas;




    public function __construct($id,$cif,$nombre,$email,$telefono,$estiloCSS,$logo,$mesas){
        $this->id = $id;
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->estiloCSS = $estiloCSS;
        $this->logo = $logo;
        $this->mesas = $mesas;
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
    public function cargarCSS($idRestaurante){
        $bd = BD::getConexion();
        $select = 'SELECT * FROM restaurantes WHERE idRestaurante='.$idRestaurante;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'restaurantes');
        $restaurante = $sentencia->fetch();
        return $restaurante['estiloCSS'];
        
    }
    public function cargarLogo($idRestaurante){
        $bd = BD::getConexion();
        $select = 'SELECT * FROM restaurantes WHERE idRestaurante='.$idRestaurante;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'restaurantes');
        $restaurante = $sentencia->fetch();
        return $restaurante['logo'];
        
    }
    
    public function cargarMesas($idRestaurante){
        $bd = BD::getConexion();
        $select = 'SELECT * FROM restaurantes WHERE idRestaurante='.$idRestaurante;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'restaurantes');
        $restaurante = $sentencia->fetch();
        return $restaurante['mesas'];
        
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