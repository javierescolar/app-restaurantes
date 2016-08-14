<?php

require_once 'BD.php';

class Plato extends Restaurante {

    protected $id;
    protected $nombre;
    protected $precio;
    protected $ingredientes;
    protected $descripcion;
    protected $imagen;
    protected $valoracion;

    public function __construct($id, $nombre, $precio, $ingredientes, $descripcion, $imagen, $valoracion) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->ingredientes = $ingredientes;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->valoracion = $valoracion;
    }

    public function guardarPlato($nombre, $precio, $ingredientesEsenciales, $ingredientesSimples, $cantidadEsenciales, $cantidadSimples, $descripcion, $imagen, $valoracion, $idCategoria, $idRestaurante) {
        $bd = BD::getConexion();
        $select = 'INSERT INTO platos(nombre,precio,descripcion,imagen,valoracion,idCategoria,idRestaurante) '
                . ' VALUES ("' . $nombre . '",' . $precio . ',"' . $descripcion . '","' . $imagen . '",' . $valoracion . ',' . $idCategoria . ',' . $idRestaurante . ')';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $idPlato = $bd->lastInsertId();
        //$productos = array_merge($ingredientesEsenciales, $ingredientesSimples);
        //$productosCantidad = array_merge($cantidadEsenciales, $cantidadSimples);
        foreach($ingredientesEsenciales as $key => $producto){
            $sentencia2 = $bd->prepare("INSERT INTO platosproductos(idPlato,idProducto,cantidad) VALUES(" . $idPlato . "," . $producto . "," . $cantidadEsenciales[$key] . ")");
            $sentencia2->execute();
        }
        foreach ($ingredientesSimples as $key => $producto) {
            $sentencia2 = $bd->prepare("INSERT INTO platosproductos(idPlato,idProducto,cantidad) VALUES(" . $idPlato . "," . $producto . "," . $cantidadSimples[$key] . ")");
            $sentencia2->execute();
        }
    }

    public function muestraPlatos() {


        $bd = BD::getConexion();
        $select = 'SELECT * FROM platos';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'platos');
        $plato = $sentencia->fetchAll();
        return $plato;
    }

    public function muestraPlatoIdTicket($idTicket) {

        $bd = BD::getConexion();
        $select = 'SELECT * FROM platos
                    inner join ticketsplatos on platos.idPlato = ticketsplatos.idPlato
                    where ticketsplatos.idTicket = :idTicket';
        $sentencia = $bd->prepare($select);
        $sentencia->execute([":idTicket" => $idTicket]);
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'platos');
        $platos = $sentencia->fetchAll();
        return $platos;
    }

    public function muestraPlatosCategoria($idCategoria) {
        $bd = BD::getConexion();
        $select = 'SELECT * FROM platos WHERE idCategoria =' . $idCategoria;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'platos');
        $plato = $sentencia->fetchAll();
        return $plato;
    }

    public function muestraPlatoId($idPlato) {
        $bd = BD::getConexion();
        $select = 'SELECT * FROM platos WHERE idPlato =' . $idPlato;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'platos');
        $plato = $sentencia->fetch();
        return $plato;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getIngredientes() {
        return $this->ingredientes;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

}

?>