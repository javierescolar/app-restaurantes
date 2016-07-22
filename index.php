
<?php
require_once('clases/Restaurantes.php');
require_once('clases/Usuarios.php');
require_once('clases/Tickets.php');
require_once('clases/Categorias.php');
require_once('clases/Platos.php');
require_once('clases/TicketsPlatos.php');
require_once('clases/Productos.php');

session_start();
//variables
$mensajeLogin = "";
$numeroMesas = 10;

if(isset($_SESSION['user'])) {
    if (isset($_POST['cerrarSesion'])) {
        unset($_SESSION['user']);
        session_destroy();
        include 'restaurante/login.php';
    } elseif(isset($_POST['datosUsuario'])){
        include 'restaurante/editProfile.php';
    } elseif (isset($_POST['crearTicket'])) {
       $_SESSION['ticketActual'] = Ticket::crearTicket($_SESSION['user']['idUsuario'],$_POST['mesa']);
       include 'restaurante/menuCategorias.php';
    } elseif (isset($_POST['idTicket'])) {
       $_SESSION['ticketActual'] = $_POST['idTicket']; 
       include 'restaurante/ticket.php';
    } elseif (isset($_POST['seleccionCategoria'])) {
        $_SESSION['categoriaSeleccionada'] = $_POST['categoriaSeleccionada'];
       include 'restaurante/menu.php';
    } elseif (isset($_POST['anadirPlato'])){
        Ticket::anadirPlatoTicket($_SESSION['ticketActual'],$_POST['idPlato']);
        Ticket::actualizarTicket($_SESSION['ticketActual']);
        include 'restaurante/menu.php';
        echo "<script type='text/javascript'>
            swal('Añadido!', 'Plato añadido al ticket', 'success');
        </script>";
    } elseif (isset ($_POST['idPlato'])) {
        include 'restaurante/platoSeleccion.php';
    } elseif (isset ($_POST['categoria'])) {
        include 'restaurante/menuCategorias.php';
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
            $mensajeLogin = "<p style='color:red'>EL usuario no existe en la base de datos o no está habilitado</p>";
            include 'restaurante/login.php';
        }
    } else {
        include 'restaurante/login.php';
    }
}






?>