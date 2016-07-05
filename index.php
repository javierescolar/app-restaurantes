
<?php
session_start();
$mensajeLogin = "";


if(isset($_SESSION['user'])){
    if(isset($_POST['cerrarSesion'])){
        unset($_SESSION['user']);
        session_destroy();
        include 'restaurante/login.php';
    }elseif (isset($_POST['datosUsuario'])) {
       include 'restaurante/editProfile.php';
    } else {
        include 'restaurante/menu.php';
    }
} else {
    
    if(isset($_POST['botonLogin'])){
        $_SESSION['user'] = [
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ];
        include 'restaurante/menu.php';
    } else {
        include 'restaurante/login.php';
    }
}

?>