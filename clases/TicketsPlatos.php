<?php

require_once 'BD.php';
require_once 'Tickets.php';

class TicketPlato extends Ticket{
    
    protected $idTicketPlato;
    protected $idPlato;
    protected $idTicket;
    
    
    public function __construct($id,$idPlato, $idTicket){
        $this->idTicketPlato = $id;
        $this->idPlato = $idPlato;
        $this->idTicket = $idTicket;
        
    }
    
    public function guardaTicketPlato(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO tickets_platos(idplato, idTicket) VALUES ('.$this->idPlato.','.$this->idTicket.')');
        $consulta->execute();
        $conexion = null;
    }
    
 
        
 

    
    
}
?>