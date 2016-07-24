
<?php

require_once('clases/BD.php');

class Usuario extends Restaurante{

    protected $idUsuario;
    protected $dni;
    protected $nombre;
    protected $apellidos;
    protected $pass;
    protected $telefono;
    protected $email;
    protected $idPerfil;
    protected $habilitado;
    protected $idRestaurante;
    
    public function __constructor($id = null, $restaurante = null, $dni = null, $nombre = null, $apellidos = null, $pass = null, $idPerfil = null, $email = null, $telefono = null, $habilitado = null) {
        
        $this->idUsuario = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->pass = $pass;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->idPerfil = $idPerfil;
        $this->habilitado = $habilitado;
        $this->idRestaurante = $restaurante;
    }

    public function loginUser($email, $pass) {
        $bd = BD::getConexion();
        $select = 'SELECT * FROM usuarios WHERE email = :email AND pass = :pass AND habilitado = 1';
        $sentencia = $bd->prepare($select);
        $sentencia->execute([":email" => $email, ":pass" => $pass]);
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
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM usuarios');
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['idUsuario'],$registro['dni'],$registro['nombre'],$registro['apellidos'],$registro['pass'],$registro['telefono'],$registro['email'],$registro['idPerfil'],$registro['habilitado'],$registro['idRestaurante']);
        }else{
            return false;
        }
    
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