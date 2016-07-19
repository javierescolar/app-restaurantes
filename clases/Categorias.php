<?php

require_once 'Conexion.php';

class Categoria extends Restaurante{
    
    protected $idCategoria;
    protected $nombre;
    
    public function __contruct($idCategoria, $nombre){
        
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
    }
    
    public function muestraCategorias(){
        
        $bd = BD::getConexion();
        $select = 'SELECT * FROM categorias';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'categorias');
        $categoria = $sentencia->fetchAll();
        return $categoria;
    
    }
    
    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
}

?>