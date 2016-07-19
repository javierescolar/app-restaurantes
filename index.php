
<?php
require_once('clases/Restaurantes.php');
require_once('clases/Usuarios.php');
require_once('clases/Tickets.php');
require_once('clases/Categorias.php');
require_once('clases/Platos.php');
require_once('clases/TicketsPlatos.php');

session_start();
//variables para pruebas
$mensajeLogin = "";

if(isset($_SESSION['user'])) {
    if (isset($_POST['cerrarSesion'])) {
        unset($_SESSION['user']);
        session_destroy();
        include 'restaurante/login.php';
    } elseif(isset($_POST['datosUsuario'])){
        include 'restaurante/editProfile.php';
    } elseif (isset($_POST['crearTicket'])) {
       include 'restaurante/menuCategorias.php';
    } elseif (isset($_POST['idTicket'])) {
       include 'restaurante/ticket.php';
    } elseif (isset($_POST['seleccionCategoria'])) {
       include 'restaurante/menu.php';
    } else {
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
    }
} else {
    if(isset($_POST['botonLogin'])){
        $usuario = Usuario::loginUser($_POST['email'],$_POST['password']);
        if($usuario){
            $_SESSION['user'] = $usuario;
            include 'restaurante/home.php';
        } else {
            echo $usuario;
            $mensajeLogin = "EL usuario no existe en la base de datos o no está habilitado";
            include 'restaurante/login.php';
        }
    } else {
        include 'restaurante/login.php';
    }
}






?>