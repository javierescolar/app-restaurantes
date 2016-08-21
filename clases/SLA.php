<?php

require_once 'BD.php';

class SLA extends Restaurante{
    
    protected $id;
    protected $nombre;
    protected $valor;
    protected $color;
    protected $idRestaurante;
    
    
    
    
    public function __construct($id=null,$nombre=null,$valor=null,$color=null,$idRestaurante=null){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->color = $color;
        $this->idRestaurante = $idRestaurante;
    }
    public function cargarPaletaSla() {
        $bd = BD::getConexion();
        $select = 'SELECT * FROM coloressla';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'coloressla');
        $datosPaleta = $sentencia->fetchAll();
        return $datosPaleta;
    }
    
    public function muestraSla($idRestaurante) {
        $bd = BD::getConexion();
        $select = 'SELECT * FROM sla WHERE idRestaurante ='.$idRestaurante;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'sla');
        $sla = $sentencia->fetchAll();
        return $sla;
    }
    
    public function guardarSla($nombre,$valor,$color,$idRestaurante){
        $conexion = BD::getConexion();
        $sentencia = $conexion->prepare('INSERT INTO sla(nombre,valor,color,idRestaurante) VALUES ("'.$nombre.'",'.$valor.',"'.$color.'",'.$idRestaurante.')');
        $consulta = $sentencia->execute();
        return $consulta;

    }
    
    public function borrarSla($id){
        $conexion = BD::getConexion();
        $sentencia = $conexion->prepare('DELETE FROM sla WHERE id = '.$id);
        $consulta = $sentencia->execute();
        return $consulta;
    }
    
     public function editarSlas($ids,$nombre,$valor,$color){
        
        foreach ($ids as $key=>$id){
            $conexion = BD::getConexion();
             $select = "UPDATE sla "
                . "SET nombre = '".$nombre[$key]."'"
                . ",valor = ".$valor[$key]
                . ",color = '".$color[$key]."'"
                . " WHERE id = ".$id;
              $sentencia = $conexion->prepare($select);
              $consulta = $sentencia->execute();
             
        }
         
    }
    
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getValor() {
        return $this->valor;
    }

    function getColor() {
        return $this->color;
    }

    function getIdRestaurante() {
        return $this->idRestaurante;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setIdRestaurante($idRestaurante) {
        $this->idRestaurante = $idRestaurante;
    }


    
    
}
?>
