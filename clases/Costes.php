<?php

require_once 'Conexion.php';

class Coste {
    
    private $coste;
    private $beneficio;
    
        
    public function __construct($coste,$beneficio){
        $this->beneficio = $beneficio;
        $this->coste = $coste
    }
    public function sumaBeneficioCoste($b, $c){
       
        $this->coste = $this->coste + $c;
        $this->beneficio = ($this->beneficio + $b)-$coste;
        
    }
    
    public function guardarCosteBeneficio(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO costes(coste,beneficio) VALUES ('.$this->coste.','.$this->beneficio.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraCosteBeneficio(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT coste, beneficio FROM costes');
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['coste'],$registro['beneficio']);
        }else{
            return false;
        }
    
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