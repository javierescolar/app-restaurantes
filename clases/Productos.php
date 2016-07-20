<?php

require_once 'BD.php';

class Productos extends Restaurante{
    
    protected $idProducto;
    protected $ean;
    protected $nombre;
    protected $cantidad;
    protected $caducidad;
    protected $precio;
    protected $categoria;
    protected $idMedia;
    protected $idRestaurante;
    
    public function __construct($idProducto=null,$ean=null,$nombre=null,$cantidad=null,$caducidad=null,
            $precio=null,$categoria=null,$idMedia=null,$idRestaurante=null){
        $this->idProducto = $idProducto;
        $this->ean = $ean;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->caducidad = $caducidad;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->idMedia = $idMedia;
        $this->idRestaurante = $idRestaurante;
        
    }
    
    public function guardarProductos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO productos(ean,nombre,cantidad,caducidad,precio) VALUES ('.$this->ean.','.$this->nombre.','.$this->cantidad.','.$this->caducidad.','.$this->precio.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraProductos(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM productos');
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['ean'],$registro['nombre'],$registro['cantidad'],$registro['caducidad'],$registro['precio']);
        }else{
            return false;
        }
    
    }
    
    public function muestraProductosPlato($ingredientes){
        $bd = BD::getConexion();
        $select = 'SELECT * FROM productos WHERE idProducto in ( :ingredientes )';
        $sentencia = $bd->prepare($select);
        $sentencia->execute([":ingredientes" => $ingredientes]);
        //$sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'productos');
        $productos = $sentencia->fetchAll();
        return $productos;
        
    }
    function getIdProducto() {
        return $this->idProducto;
    }

    function getEan() {
        return $this->ean;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getCaducidad() {
        return $this->caducidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getIdMedia() {
        return $this->idMedia;
    }

    function getIdRestaurante() {
        return $this->idRestaurante;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setEan($ean) {
        $this->ean = $ean;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setCaducidad($caducidad) {
        $this->caducidad = $caducidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setIdMedia($idMedia) {
        $this->idMedia = $idMedia;
    }

    function setIdRestaurante($idRestaurante) {
        $this->idRestaurante = $idRestaurante;
    }


    
}
?>