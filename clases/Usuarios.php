
<?php

require_once('clases/BD.php');

class Usuario extends Restaurante{

    protected $idUsuario;
    protected $idRestaurante;
    protected $dni;
    protected $nombre;
    protected $apellidos;
    protected $email;
    protected $telefono;
    protected $perfil;
    protected $pass;
    

    public function __constructor($id, $restaurante, $dni, $nombre, $apellidos, $pass, $idPerfil, $email, $telefono, $habilitado) {
        $this->idRestaurante = $restaurante;
        $this->idUsuario = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->perfil = $perfil;
    }

    public function loginUser($email, $pass) {
        $bd = BD::getConexion();
        $select = 'SELECT * FROM usuarios WHERE email = :email AND password = :password AND habilitado = 1';
        $sentencia = $bd->prepare($select);
        $sentencia->execute([":email" => $email, ":password" => $pass]);
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'usuarios');
        $usuario = $sentencia->fetch();
        return $usuario;
    }
    
    
    
    public function guardaUsuario(){
        
        $isRestaurante = parent::getId();
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO usuarios(dni, nombre, apellidos, pass, telefono, email, idPerfil, habilitado, idRestaurante) VALUES ('.$this->dni.','.$this->nombre.','.$this->apellidos.','.$this->pass.','.$this->telefono.','.$this->email.','.$this->idPerfil.','.$this->habilitado.','.$this->idRestaurante.')');
        $consulta->execute();
        $conexion = null;
        
    }
    
    public function muestraUsuarios(){
        
        $bd = BD::getConexion();
        $select = 'SELECT * FROM usuarios';
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'usuarios');
        $usuario = $sentencia->fetchAll();
        return $usuario;
    
    }
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdRestaurante() {
        return $this->idRestaurante;
    }

    function getDni() {
        return $this->dni;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getPass() {
        return $this->pass;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdRestaurante($idRestaurante) {
        $this->idRestaurante = $idRestaurante;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

}

?>