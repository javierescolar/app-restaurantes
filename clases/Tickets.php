<?php

require_once 'BD.php';
require_once 'Platos.php';
class Ticket extends Plato{
    
    protected $mesa;
    protected $fecha;
    protected $idUsuario;
    protected $total;
    protected $abierto;
    
    public function __construct($mesa,$fecha,$idUsuario,$total,$abierto){
        
        $this->mesa = $mesa;
        $this->fecha = $fecha;
        $this->idUsuario = $idUsuario;
        $this->total = $total;
        $this->abierto = $abierto;
    }
    
    public function guardaTicket(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO tickets(mesa,fecha,vendedor,total,abierto) VALUES ('.$this->mesa.','.$this->fecha.','.$this->vendedor.','.$this->total.','.$this->abierto.')');
        $consulta->execute();
        $conexion = null;
    }
    
    public function muestraTickets($user){
        
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('SELECT * FROM tickets WHERE idUsuario = :idUser AND abierto = 1');
        $consulta->execute([":idUser" => $user]);
        $registro = $consulta->fetchAll();
        return $registro;
    }
    
    public function muestraTicketId($idTicket){  
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('SELECT * FROM tickets WHERE idTicket = :idTicket');
        $consulta->execute([":idTicket" => $idTicket]);
        $registro = $consulta->fetch();
        return $registro;
    }
    
    public function crearTicket($user,$mesa,$restaurante){  
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('INSERT INTO tickets(mesa,fecha,idUsuario,abierto,idRestaurante) VALUES (:mesa,:fecha,:idUsuario,1,:idRestaurante)');
        $consulta->execute([":fecha" => date("Y-m-d"), ":idUsuario" => $user, ":mesa" => $mesa, ":idRestaurante" => $restaurante]);
        $idInsertado = $conexion->lastInsertId();
        return $idInsertado;
    }
    
    public function anadirPlatoTicket($idTicket,$idPlato,$ingredientes){  
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('INSERT INTO ticketsplatos(idTicket,idPlato,ordenEspecial) VALUES (:idTicket,:idPlato, :ingredientes)');
        return $consulta->execute([":idTicket" => $idTicket, ":idPlato" => $idPlato, ":ingredientes" => $ingredientes]);
    }
    
    public function borrarPlatoTicket($idTicketPlato){  
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('DELETE FROM ticketsplatos WHERE idTicketPlato = :idTicketPlato');
        return $consulta->execute([":idTicketPlato" => $idTicketPlato]);
    }
    
    public function actualizarTicket($idTicket){  
        $conexion = BD::getConexion();
        $select = " UPDATE tickets
            SET total = (SELECT sum(platos.precio) FROM platos
                    INNER JOIN ticketsplatos ON platos.idPlato = ticketsplatos.idPlato
                    WHERE ticketsplatos.idTicket = :idTicket)
            WHERE idTicket = :idTicket   ";
        $consulta = $conexion->prepare($select);
        return $consulta->execute([":idTicket" => $idTicket]);
        
    }
    
    public function muestraPlatosTickets($idTicket){  
        $conexion = BD::getConexion();
        $select  = "SELECT ticketsplatos.idTicketPlato, platos.nombre as nombre, platos.precio as precio, ticketsplatos.ordenEspecial "
                . " FROM ticketsplatos"
                . " INNER JOIN platos ON platos.idPlato = ticketsplatos.idPlato "
                . " WHERE ticketsplatos.idTicket = :idTicket";
        $consulta = $conexion->prepare($select);
        $consulta->execute([":idTicket" => $idTicket]);
        $registros = $consulta->fetchAll();
        return $registros;
    }
    
    public function cerrarTicket($idTicket){  
        $conexion = BD::getConexion();
        $select = " UPDATE tickets
            SET abierto = 0
            WHERE idTicket = :idTicket";
        $consulta = $conexion->prepare($select);
        return $consulta->execute([":idTicket" => $idTicket]);
        
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