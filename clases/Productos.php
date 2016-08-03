<?php

require_once 'BD.php';

class Producto extends Restaurante{
    
    protected $idProducto;
    protected $ean;
    protected $nombre;
    protected $cantidad;
    protected $caducidad;
    protected $precio;
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
    public function muestraProductosEsenciales($esencial){
        $bd = BD::getConexion();
        $select = 'SELECT * FROM productos WHERE esencial='.$esencial;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'productos');
        $productos = $sentencia->fetchAll();
        return $productos;
        
    }
    
    public function guardarProducto($ean,$nombre,$cantidad,$caducidad,$precio,$esencial,$medida,$idResturante){
        $conexion = BD::getConexion();
        $sentencia = $conexion->prepare('INSERT INTO productos(ean,nombre,cantidad,caducidad,precio,esencial,idMedida,idRestaurante) VALUES ('.$ean.',"'.$nombre.'",'.$cantidad.',"'.$caducidad.'",'.$precio.','.$esencial.','.$medida.','.$idResturante.')');
        $consulta = $sentencia->execute();
        return $consulta;

    }
    
    public function borrarProducto($id){
        $conexion = BD::getConexion();
        $sentencia = $conexion->prepare('DELETE FROM productos WHERE idProducto = '.$id);
        $consulta = $sentencia->execute();
        return $consulta;
    }
    
    public function editarProductos($ids,$ean,$nombre,$cantidad,$caducidad,$precio,$medida,$esencial){
        
        foreach ($ids as $key=>$id){
            $conexion = BD::getConexion();
             $select = "UPDATE productos "
                . "SET ean = '".$ean[$key]."'"
                . ",nombre = '".$nombre[$key]."'"
                . ",cantidad = ".$cantidad[$key]
                . ",caducidad = '".$caducidad[$key]."'"
                . ",precio = ".$precio[$key]
                . ",idMedida = ".$medida[$key]
                . " WHERE idProducto = ".$id;
              $sentencia = $conexion->prepare($select);
              $consulta = $sentencia->execute();
             
        }
         
    }
    
    
    public function muestraProductos($idRestaurante){
        
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('SELECT * FROM productos WHERE idRestaurante = :idRestaurante');
        $consulta->execute(["idRestaurante" => $idRestaurante]);
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'productos');
        $productos = $consulta->fetchAll();
        return $productos;
        
    }
    
    public function muestraProductosPlato($ingredientes){
        $ingredientes = explode(",",substr($ingredientes, 0, (strlen($ingredientes) - 1)));
         $bd = BD::getConexion();
        $select = 'SELECT * FROM productos WHERE idProducto in (';
        foreach( $ingredientes as $ingrediente){
            $select = $select.(int)$ingrediente.",";
        }
        $select = substr($select,0, (strlen($select) - 1));
        $select = $select.")";
       
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
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