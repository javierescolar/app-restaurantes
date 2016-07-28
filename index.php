
<?php
require_once('clases/Restaurantes.php');
require_once('clases/Usuarios.php');
require_once('clases/Tickets.php');
require_once('clases/Categorias.php');
require_once('clases/Platos.php');
require_once('clases/TicketsPlatos.php');
require_once('clases/Productos.php');
require_once('clases/Perfiles.php');
require_once('clases/Medidas.php');

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
    } elseif (isset($_POST['productos'])) {
        include 'restaurante/products.php';
        echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; </script>";
    } elseif (isset($_POST['crearTicket'])) {
       $_SESSION['ticketActual'] = Ticket::crearTicket($_SESSION['user']['idUsuario'],$_POST['mesa'],$_SESSION['user']['idRestaurante']);
       include 'restaurante/menuCategorias.php';
    } elseif (isset($_POST['idTicket'])) {
       $_SESSION['ticketActual'] = $_POST['idTicket'];
       include 'restaurante/ticket.php';
    } elseif (isset($_POST['seleccionCategoria'])) {
        $_SESSION['categoriaSeleccionada'] = $_POST['categoriaSeleccionada'];
       include 'restaurante/menu.php';
    } elseif(isset ($_POST['dropPlato'])){
        Ticket::borrarPlatoTicket($_POST['idTicketPlato']);
        Ticket::actualizarTicket($_SESSION['ticketActual']);
        include 'restaurante/ticket.php';
        echo "<script type='text/javascript'>
            swal('Borrado!', 'Plato borrado del ticket', 'success');
        </script>";
    } elseif (isset($_POST['anadirPlato'])){
        Ticket::anadirPlatoTicket($_SESSION['ticketActual'],$_POST['idPlato'],"");
        Ticket::actualizarTicket($_SESSION['ticketActual']);
        include 'restaurante/menu.php';
        echo "<script type='text/javascript'>
            swal('Añadido!', 'Plato añadido al ticket', 'success');
        </script>";
    }elseif (isset($_POST['anadirPlatoSeleccion'])){
        $ingredientes = "";
        if(isset($_POST['ingrediente'])){
            foreach($_POST['ingrediente'] as $ingrediente){
            $ingredientes = $ingredientes."".$ingrediente.",";
            }
        }
        Ticket::anadirPlatoTicket($_SESSION['ticketActual'],$_POST['idPlato'],$ingredientes);
        Ticket::actualizarTicket($_SESSION['ticketActual']);
        include 'restaurante/menu.php';
        echo "<script type='text/javascript'>
            swal('Añadido!', 'Plato añadido al ticket', 'success');
        </script>";
    } elseif (isset ($_POST['idPlato'])) {
        include 'restaurante/platoSeleccion.php';
        
    } elseif (isset ($_POST['categoriaSubNav'])) {
        include 'restaurante/menuCategorias.php';
    } elseif (isset ($_POST['platosSubNav'])) {
        include 'restaurante/menu.php';
    } elseif(isset ($_POST['ticketSubNav'])){
        include 'restaurante/ticket.php';
    } elseif (isset ($_POST['platos'])) {
        include 'restaurante/platos.php';
        echo "<script type='text/javascript'> $('navPlatos').style.background = 'black'; </script>";
    } elseif (isset($_POST['guardarPlatos'])){
        $productosEsenciales = "";
        if(isset($_POST["newIngredientesEsenciales"])){
            foreach ($_POST["newIngredientesEsenciales"] as $producto){
                $productosEsenciales = $productosEsenciales.$producto.",";
            }
            if(isset($_POST["newIngredientesSimples"])){
                foreach ($_POST["newIngredientesSimples"] as $producto){
                    $productosSimples = $productosSimples.$producto.",";
                }
            }
        $productos = $productosEsenciales.$productosSimples;
        move_uploaded_file($_FILES['newImagen']['tmp_name'],'img/'.$_FILES['newImagen']['name']);
        Plato::guardarPlato($_POST['newNombre'],$_POST['newPrecio'],$productos,$_POST['newDescripcion'],$_FILES['newImagen']['name'],1,$_POST['newCategoria'],$_SESSION['user']['idRestaurante']);
        }
        include 'restaurante/platos.php';
        echo "<script type='text/javascript'> $('navPlatos').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
            swal('Guardado!', 'Plato guardado correctamente', 'success');
        </script>";
    } elseif(isset ($_POST['accionTicket']) && $_POST['accionTicket'] == 'cerrarTicket'){
        Ticket::cerrarTicket($_SESSION['ticketActual']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Cerrado!', 'Ticket cerrado', 'success');
        </script>";
    } elseif(isset ($_POST['accionTicket']) && $_POST['accionTicket'] == 'anularTicket'){
        Ticket::anularTicket($_SESSION['ticketActual']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Anulado!', 'Ticket anulado', 'success');
        </script>";
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
