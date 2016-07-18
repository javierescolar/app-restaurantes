
<?php

require_once('clases/Conexion.php');

class Usuario extends Restaurante{

    private $id;
    private $restaurante;
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono;
    private $perfil;

    public function __constructor($id = null, $restaurante = null, $dni = null, $nombre = null, $apellidos = null, $email = null, $telefono = null, $perfil = null) {
        $this->restaurante = $restaurante;
        $this->id = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->perfil = $perfil;
    }

    public function loginUser($email, $pass) {
        $bd = new Conexion();
        $select = 'SELECT * FROM usuarios WHERE email = :nombre AND password = :password';
        $sentencia = $bd->prepare($select);
        $sentencia->execute([":email" => $email, ":password" => $pass]);
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'usuarios');
        $usuario = $sentencia->fetch();
        return $usuario;
    }

}

?>