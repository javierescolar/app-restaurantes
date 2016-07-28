<?php
class Conexion extends PDO {
    private $tipo = 'mysql';
    private $host = '127.0.0.1';
    private $baseDeDatos = 'apprestaurante';
    private $usuario = 'root';
    private $pass = '';
   
    public function __construct() {
      //sobrescribe el metodo construct de la clase PDO.
      try{
          parent::__construct($this->tipo.':host='.$this->host.';dbname='.$this->baseDeDatos, $this->usuario, $this->pass);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
    }
}
?>