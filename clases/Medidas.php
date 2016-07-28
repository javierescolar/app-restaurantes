<?php

require_once 'BD.php';

class Medida extends Producto{

    protected $nombre;
    
    public function __construct($nombre){
        $this->nombre = $nombre;
    }
    
    public function muestraMedidas(){
        
        $bd = BD::getConexion();
        $select = 'SELECT * FROM medidas';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'medidas');
        $medidas = $sentencia->fetchAll();
        return $medidas;
    }
    
    public function guardaMedida(){
        
        $bd = BD::getConexion();
        $select = 'INSERT INTO medidas(nombre) VALUES ("'.$this->nombre.'")';
        $sentencia = $bd->prepare($select);
        $consulta = $sentencia->execute();
        return $consulta;
    }
    
}
?>