<?php

require_once 'BD.php';
require_once 'Platos.php';

class Ticket extends Plato {

    protected $mesa;
    protected $fecha;
    protected $idUsuario;
    protected $total;
    protected $abierto;

    public function __construct($mesa, $fecha, $idUsuario, $total, $abierto) {

        $this->mesa = $mesa;
        $this->fecha = $fecha;
        $this->idUsuario = $idUsuario;
        $this->total = $total;
        $this->abierto = $abierto;
    }

    public function muestraTickets($user) {

        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('SELECT * FROM tickets WHERE idUsuario = :idUser AND abierto = 1');
        $consulta->execute([":idUser" => $user]);
        $registro = $consulta->fetchAll();
        return $registro;
    }

    public function muestraTicketsComandas($idRestaurante) {

        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('SELECT * FROM tickets WHERE idRestaurante = :idRestaurante AND abierto = 1 AND abiertoCocina = 1');
        $consulta->execute([":idRestaurante" => $idRestaurante]);
        $registro = $consulta->fetchAll();
        return $registro;
    }

    public function muestraTicketId($idTicket) {
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('SELECT * FROM tickets WHERE idTicket = :idTicket');
        $consulta->execute([":idTicket" => $idTicket]);
        $registro = $consulta->fetch();
        return $registro;
    }

    public function crearTicket($user, $mesa, $restaurante) {
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('INSERT INTO tickets(mesa,fecha,idUsuario,abierto,idRestaurante) VALUES (:mesa,:fecha,:idUsuario,1,:idRestaurante)');
        $consulta->execute([":fecha" => date("Y-m-d H:i:s"), ":idUsuario" => $user, ":mesa" => $mesa, ":idRestaurante" => $restaurante]);
        $idInsertado = $conexion->lastInsertId();
        return $idInsertado;
    }

    public function anadirPlatoTicket($idTicket, $idPlato, $ingredientes) {
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('INSERT INTO ticketsplatos(idTicket,idPlato,ordenEspecial) VALUES (:idTicket,:idPlato, :ingredientes)');
        $consulta->execute([":idTicket" => $idTicket, ":idPlato" => $idPlato, ":ingredientes" => $ingredientes]);
    }

    public function borrarPlatoTicket($idTicketPlato) {
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('DELETE FROM ticketsplatos WHERE idTicketPlato = :idTicketPlato');
        return $consulta->execute([":idTicketPlato" => $idTicketPlato]);
    }

    public function actualizarTicket($idTicket) {
        $conexion = BD::getConexion();
        $select = " UPDATE tickets
            SET total = (SELECT sum(platos.precio) FROM platos
                    INNER JOIN ticketsplatos ON platos.idPlato = ticketsplatos.idPlato
                    WHERE ticketsplatos.idTicket = :idTicket)
            WHERE idTicket = :idTicket   ";
        $consulta = $conexion->prepare($select);
        return $consulta->execute([":idTicket" => $idTicket]);
    }

    public function muestraPlatosTickets($idTicket) {
        $conexion = BD::getConexion();
        $select = "SELECT ticketsplatos.idTicketPlato, platos.nombre as nombre, platos.precio as precio, ticketsplatos.ordenEspecial, ticketsplatos.preparado "
                . " FROM ticketsplatos"
                . " INNER JOIN platos ON platos.idPlato = ticketsplatos.idPlato "
                . " WHERE ticketsplatos.idTicket = :idTicket";
        $consulta = $conexion->prepare($select);
        $consulta->execute([":idTicket" => $idTicket]);
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function cerrarTicket($idTicket) {
        $conexion = BD::getConexion();
        $select = " UPDATE tickets
            SET abierto = 0
            WHERE idTicket = :idTicket";
        $consulta = $conexion->prepare($select);
        return $consulta->execute([":idTicket" => $idTicket]);
    }

    public function cerrarComanda($idTicket) {
        $conexion = BD::getConexion();
        $select = " UPDATE tickets
            SET abiertoCocina = 0
            WHERE idTicket = :idTicket";
        $consulta = $conexion->prepare($select);
        $select2 = "UPDATE ticketsplatos"
                . " SET preparado = 1"
                . " WHERE idTicket = :idTicket";
        $consulta2 = $conexion->prepare($select2);
        $consulta->execute([":idTicket" => $idTicket]);
        $consulta2->execute([":idTicket" => $idTicket]);
    }

    public function anularTicket($idTicket) {
        $conexion = BD::getConexion();
        $select = " DELETE FROM tickets WHERE idTicket = :idTicket;"
                . " DELETE FROM ticketsplatos WHERE idTicket = :idTicket";
        $consulta = $conexion->prepare($select);
        return $consulta->execute([":idTicket" => $idTicket]);
    }

    public function mandarComanda($idTicket) {
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('UPDATE tickets set abiertoCocina = 1 WHERE IdTicket =' . $idTicket);
        $consulta->execute();
    }

    public function marcarPlatoTerminado($idTicketPlato) {
        $conexion = BD::getConexion();
        $consulta2 = $conexion->prepare('SELECT * FROM ticketsplatos WHERE idTicketPlato =' . $idTicketPlato);
        $consulta2->execute();
        $consulta2->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'ticketsplatos');
        $registro = $consulta2->fetch();
        $terminado = ($registro['preparado'] == 0) ? 1 : 0;
        $select = 'UPDATE ticketsplatos SET preparado = ' . $terminado . ' WHERE idTicketPlato =' . $idTicketPlato;
        $consulta = $conexion->prepare($select);

        return $consulta->execute();
    }

    public function mesasOcupadas($idRestaurante) {
        $conexion = BD::getConexion();
        $consulta = $conexion->prepare('SELECT mesa FROM tickets WHERE abierto = 1 and idRestaurante = :idRestaurante');
        $consulta->execute([":idRestaurante" => $idRestaurante]);
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'tickets');
        $registros = $consulta->fetchAll();
        return $registros;
    }

    public function cambiarMesaTicket($idTicket,$mesa) {
        $conexion = BD::getConexion();
        $select = 'UPDATE tickets SET mesa = :mesa WHERE idTicket = :idTicket';
        $consulta = $conexion->prepare($select);
        return $consulta->execute([":idTicket" => $idTicket , ":mesa" => $mesa]);
        
    }

    public function getMesa() {
        return $this->mesa;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getVendedor() {
        return $this->vendedor;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getAbierto() {
        return $this->abierto;
    }

    public function setMesa($mesa) {
        $this->mesa = $mesa;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setVendedor($vendedor) {
        $this->vendedor = $vendedor;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setAbierto($abierto) {
        $this->abierto = $abierto;
    }

}

?>