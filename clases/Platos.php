<?php

require_once 'Conexion.php';

class Platos {
    
    private $id;
    private $nombre;
    private $precio;
    private $ingredientes;
    private $descripcion;
    private $imagen;
    
    
    
    public function __construct($id,$nombre,$precio,$ingredientes,$descripcion,$imagen){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->ingredientes = $ingredientes;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }
    
    
    public function guardarPlato(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO platos(id,nombre,precio,ingredientes,descripcion,imagen,idRestaurante) VALUES ('.$this->id.','.$this->nombre.','.$this->precio.','.$this->ingredientes.','.$this->descripcion.','.$this->imagen.','.$this->idRestaurante.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraPlatos(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM platos');
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['id'],$registro['nombre'],$registro['precio'],$registro['ingredientes'],$registro['descripcion'],$registro['imagen'],$registro['idRestaurante']);
        }else{
            return false;
        }
    
    }
    
    public function getId() {
       return $this->id;
    }
    public function getNombre() {
       return $this->nombre;
    }
     public function getPrecio() {
       return $this->precio;
    }
    public function getIngredientes() {
       return $this->ingredientes;
    }
     public function getDescripcion() {
       return $this->descripcion;
    }
    public function getImagen() {
       return $this->imagen;
    }
    public function setId($id) {
       $this->id = $id;
    }
    public function setNombre($nombre) {
       $this->nombre = $nombre;
    }
    public function setPrecio($precio) {
       $this->precio = $precio;
    }
    public function setIngredientes($ingredientes) {
       $this->ingredientes = $ingredientes;
    }
    public function setDescripcion($descripcion) {
       $this->descripcion = $descripcion;
    }
    public function setImagen($imagen) {
       $this->imagen = $imagen;
    }
}
?>