
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
    } elseif(isset($_POST['editarPerfil'])){
        include 'restaurante/editProfile.php';
        echo "<script type='text/javascript'>
            swal('Guardado!', 'Se han sobreescrito los datos', 'success');
        </script>";
    } elseif (isset($_POST['productos'])) {
         include 'restaurante/products.php';
    }else {
        include 'restaurante/menu.php';
    }
} else {
    
    if(isset($_POST['botonLogin'])){
        $_SESSION['user'] = [
            "dni" => "53214567P",
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "nombre" => "Administrador",
            "apellidos" => "Admin Admin",
            "telefono" => 666999666,
            "perfil" => "Admin.Plataforma"
        ];
        include 'restaurante/menu.php';
    } else {
        include 'restaurante/login.php';
    }
}

?>