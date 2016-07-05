
<?php
$mensajeLogin = "";


if($_SESSION['user']){
    if(isset($_POST['cerrarSession'])){
        unset($_SESSION['user']);
        session_destroy();
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