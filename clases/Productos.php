<?php

require_once 'Conexion.php';

class Productos extends Restaurante{
    
    private $ean;
    private $nombre;
    private $cantidad;
    private $caducidad;
    private $precio;
    
    public function __construct($ean,$nombre,$cantidad,$caducidad,$precio){
        $this->ean = $ean;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->caducidad = $caducidad;
        $this->precio = $precio;
        
    }
    
    public function guardarProductos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO productos(ean,nombre,cantidad,caducidad,precio) VALUES ('.$this->ean.','.$this->nombre.','.$this->cantidad.','.$this->caducidad.','.$this->precio.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraProductos(){
        
        
        $bd = BD::getConexion();
        $select = 'SELECT * FROM productos';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'productos');
        $producto = $sentencia->fetchAll();
        return $producto;
    
    }
    
    public function getEan() {
       return $this->ean;
    }
    public function getNombre() {
       return $this->nombre;
    }
     public function getPrecio() {
       return $this->precio;
    }
    public function getCantidad() {
       return $this->cantidad;
    }
     public function getCaducidad() {
       return $this->caducidad;
    }
    public function setEan($ean) {
       $this->ean = $ean;
    }
    public function setNombre($nombre) {
       $this->nombre = $nombre;
    }
    public function setPrecio($precio) {
       $this->precio = $precio;
    }
    public function setCantidad($cantidad) {
       $this->cantidad = $cantidad;
    }
    public function setCaducidad($caducidad) {
       $this->caducidad = $caducidad;
    }
}
?>