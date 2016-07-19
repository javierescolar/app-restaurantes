<?php

require_once 'Conexion.php';

class Coste extends Restaurante{
    
    protected $coste;
    protected $beneficio;
    protected $empleado;
    protected $ingredientes;
    protected $local;
    protected $IVA = 21;
    
        
    public function __construct($coste,$beneficio){
        $this->beneficio = $beneficio;
        $this->coste = $coste;
    }
    
    function calculaIva($precio){
        $iva = ($precio*$IVA)/100;
        return $iva;
    } 
    
    public function sumaBeneficioCoste($b, $c){
       
        $this->coste = $this->coste + ($c-calculaIva($c));
        $this->beneficio = $this->beneficio + (($b-calculaIva($b))-($c-calculaIva($c)));
        
    }
    
    public function guardarCosteBeneficio(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO costes(coste,beneficio) VALUES ('.$this->coste.','.$this->beneficio.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraCosteBeneficio(){
        
        
        $bd = BD::getConexion();
        $select = 'SELECT coste, beneficio FROM costes';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'costes');
        $coste = $sentencia->fetchAll();
        return $coste;
    
    }
    
    
    public function getCoste() {
       return $this->coste;
    }
    public function getBeneficio() {
       return $this->beneficio;
    }
    public function setCoste($coste) {
       $this->coste = $coste;
    }
    public function setBeneficio($beneficio) {
       $this->beneficio = $beneficio;
    }
}
?>