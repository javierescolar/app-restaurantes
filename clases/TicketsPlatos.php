<?php

require_once 'BD.php';

class TicketPlato extends Ticket{
    
    protected $idTicketPlato;
    protected $idPlato;
    protected $idTicket;
    
    
    public function __construct($plato, $idTicket){
        
        $this->idPlato = $plato;
        $this->idTicket = $idTicket;
        
    }
    
    public function guardaTicketPlato(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO tickets_platos(plato,precio,idTicket) VALUES ('.$this->plato.','.$this->precio.','.$this->idTicket.')');
        $consulta->execute();
        $conexion = null;
    }
    
      public function muestraTikectPlato($idTicket){
        
        $bd = BD::getConexion();
        $select = 'SELECT * FROM ticketplatos WHERE idTicket = :idTicket';
        $sentencia = $bd->prepare($select);
        $sentencia->execute([":idTicket" => $idTicket]);
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'ticketPlatos');
        $categoria = $sentencia->fetchAll();
        return $categoria;
    
    }
        
 

    
    
}
?>