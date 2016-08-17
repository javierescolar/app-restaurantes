<?php

require_once 'BD.php';

class Factura extends Restaurante{
    
    protected $idFactura;
    protected $numReferencia;
    protected $pago;
    protected $fechaPago;
    protected $idTipoFactura;
    protected $idRestaurante;
    
    
    
    
    public function __construct($idFactura=null,$numReferencia=null,$pago=null,$fechaPago=null,$idTipoFactura=null,$idRestaurante=null){
        $this->idFactura = $idFactura;
        $this->numReferencia = $numReferencia;
        $this->pago = $pago;
        $this->fechaPago = $fechaPago;
        $this->idTipoFactura = $idTipoFactura;
        $this->idRestaurante = $idRestaurante;
    }
    
   
    public function muestraFacturas($tipoFacura,$idRestaurante) {
        $bd = BD::getConexion();
        $select = 'SELECT * FROM facturacion WHERE idTipoFactura = '.$tipoFacura.' AND idRestaurante ='.$idRestaurante;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturas = $sentencia->fetchAll();
        return $facturas;
    }
    
    public function guardarFactura($numReferencia,$pago,$fechaPago,$idtipoFactura,$idRestaurante){
        $conexion = BD::getConexion();
        $sentencia = $conexion->prepare('INSERT INTO facturacion(numReferencia,pago,fechaPago,idTipoFactura,idRestaurante) VALUES ("'.$numReferencia.'",'.$pago.',"'.$fechaPago.'",'.$idtipoFactura.','.$idRestaurante.')');
        $consulta = $sentencia->execute();
        return $consulta;

    }
    
    public function borrarFactura($id){
        $conexion = BD::getConexion();
        $sentencia = $conexion->prepare('DELETE FROM facturacion WHERE idFactura = '.$id);
        $consulta = $sentencia->execute();
        return $consulta;
    }
    
     public function editarFacturas($ids,$numReferencia,$pago,$fechaPago){
        
        foreach ($ids as $key=>$id){
            $conexion = BD::getConexion();
             $select = "UPDATE facturacion "
                . "SET numReferencia = '".$numReferencia[$key]."'"
                . ",pago = ".$pago[$key]
                . ",fechaPago = '".$fechaPago[$key]."'"
                . " WHERE idFactura = ".$id;
              $sentencia = $conexion->prepare($select);
              $consulta = $sentencia->execute();
             
        }
         
    }
    
    function getIdFactura() {
        return $this->idFactura;
    }

    function getNumReferencia() {
        return $this->numReferencia;
    }

    function getPago() {
        return $this->pago;
    }

    function getFechaPago() {
        return $this->fechaPago;
    }

    function getIdTipoFactura() {
        return $this->idTipoFactura;
    }

    function getIdRestaurante() {
        return $this->idRestaurante;
    }

    function setIdFactura($idFactura) {
        $this->idFactura = $idFactura;
    }

    function setNumReferencia($numReferencia) {
        $this->numReferencia = $numReferencia;
    }

    function setPago($pago) {
        $this->pago = $pago;
    }

    function setFechaPago($fechaPago) {
        $this->fechaPago = $fechaPago;
    }

    function setIdTipoFactura($idTipoFactura) {
        $this->idTipoFactura = $idTipoFactura;
    }

    function setIdRestaurante($idRestaurante) {
        $this->idRestaurante = $idRestaurante;
    }


  

    
    
}
?>
