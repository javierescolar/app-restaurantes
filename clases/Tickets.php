<?php

require_once 'Conexion.php';

class Ticket extends Plato{
    
    protected $mesa;
    protected $fecha;
    protected $vendedor;
    protected $total;
    protected $abierto;
    
    public function __construct($mesa,$fecha,$vendedor,$total,$abierto){
        
        $this->mesa = $mesa;
        $this->fecha = $fecha;
        $this->vendedor = $vendedor;
        $this->total = $total;
        $this->abierto = $abierto;
    }
    
    public function guardaTicket(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO tickets(mesa,fecha,vendedor,total,abierto) VALUES ('.$this->mesa.','.$this->fecha.','.$this->vendedor.','.$this->total.','.$this->abierto.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraTickets(){
        
        $bd = BD::getConexion();
        $select = 'SELECT * FROM tickets';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'tickets');
        $ticket = $sentencia->fetchAll();
        return $ticket;
    }
    
    public function getMesa(){
        return $this->mesa;
    }
     public function getFecha(){
        return $this->fecha;
    }
     public function getVendedor(){
        return $this->vendedor;
    }
     public function getTotal(){
        return $this->total;
    }
     public function getAbierto(){
        return $this->abierto;
    }
    public function setMesa($mesa){
        $this->mesa = $mesa;
    }
     public function setFecha($fecha){
        $this->fecha = $fecha;
    }
     public function setVendedor($vendedor){
        $this->vendedor = $vendedor;
    }
     public function setTotal($total){
        $this->total = $total;
    }
     public function setAbierto($abierto){
        $this->abierto = $abierto;
    }
}
?>