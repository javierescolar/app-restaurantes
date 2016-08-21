
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
require_once('clases/SLA.php');
require_once('clases/Facturas.php');

session_start();
//variables
$mensajeLogin = "";


if (isset($_SESSION['user'])) {
    if (isset($_POST['cerrarSesion'])) {
        unset($_SESSION['user']);
        session_destroy();
        include 'restaurante/login.php';
        echo '<script type="text/javascript">
                responsiveVoice.pause();
            </script>';
    } elseif (isset($_POST['idPlatoEnElTicket']) && $_POST['idPlatoEnElTicket'] != "") {
        Ticket::marcarPlatoTerminado($_POST['idPlatoEnElTicket']);
        Producto::restarProductosPlato($_POST['idPlatoEnElTicket']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
    } elseif (isset($_POST['datosUsuario'])) {
        include 'restaurante/editProfile.php';
    } elseif (isset($_POST['nominas'])) {
        $_SESSION['tipoFactura'] = 1;
        include 'restaurante/factuNominas.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
    } elseif (isset($_POST['luz'])) {
        $_SESSION['tipoFactura'] = 2;
        include 'restaurante/factuLuz.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
    } elseif (isset($_POST['agua'])) {
        $_SESSION['tipoFactura'] = 3;
        include 'restaurante/factuAgua.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
    } elseif (isset($_POST['gas'])) {
        $_SESSION['tipoFactura'] = 4;
        include 'restaurante/factuGas.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
    } elseif (isset($_POST['publicidad'])) {
        $_SESSION['tipoFactura'] = 5;
        include 'restaurante/factuPublicidad.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
    } elseif (isset($_POST['servicios'])) {
        $_SESSION['tipoFactura'] = 6;
        include 'restaurante/factuServicios.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
    }  elseif (isset($_POST['impuestos'])) {
        $_SESSION['tipoFactura'] = 7;
        include 'restaurante/factuImpuestos.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
    } elseif (isset($_POST['carta'])) {
        include 'restaurante/menuCategorias.php';
        echo "<script type='text/javascript'> $('navCarta').style.background = 'black'; </script>";
    } elseif (isset($_POST['editarPerfil'])) {
        $_SESSION['user'] = Usuario::editarUsuario($_POST['newDni'], $_POST['newNombre'], $_POST['newApellidos'], $_POST['newTelefono'], $_POST['newEmail'], $_SESSION['user']['idRestaurante'], $_SESSION['user']['idUsuario']);
        include 'restaurante/editProfile.php';
        echo "<script type='text/javascript'>
            swal('Guardado!', 'Perfil editado', 'success');
        </script>";
    } elseif (isset($_POST['productos'])) {
        include 'restaurante/products.php';
        echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; "
        . " origenFormProductos('productos'); </script>";
    } elseif (isset($_POST['crearTicket'])) {
        $_SESSION['ticketActual'] = Ticket::crearTicket($_SESSION['user']['idUsuario'], $_POST['mesa'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/menuCategorias.php';
    } elseif (isset($_POST['idTicket'])) {
        $_SESSION['ticketActual'] = $_POST['idTicket'];
        include 'restaurante/ticket.php';
    } elseif (isset($_POST['seleccionCategoria'])) {
        $_SESSION['categoriaSeleccionada'] = $_POST['categoriaSeleccionada'];
        include 'restaurante/menu.php';
    } elseif (isset($_POST['dropPlato'])) {
        Ticket::borrarPlatoTicket($_POST['idTicketPlato']);
        Ticket::actualizarTicket($_SESSION['ticketActual']);
        include 'restaurante/ticket.php';
        echo "<script type='text/javascript'>
            swal('Borrado!', 'Plato borrado del ticket', 'success');
        </script>";
    } elseif (isset($_POST['anadirPlato'])) {
        Ticket::anadirPlatoTicket($_SESSION['ticketActual'], $_POST['idPlato'], "");
        Ticket::actualizarTicket($_SESSION['ticketActual']);
        include 'restaurante/menu.php';
        echo "<script type='text/javascript'>
            swal('Añadido!', 'Plato añadido al ticket', 'success');
        </script>";
    } elseif (isset($_POST['anadirPlatoSeleccion'])) {
        $ingredientes = "";
        if (isset($_POST['ingrediente'])) {
            foreach ($_POST['ingrediente'] as $ingrediente) {
                $ingredientes = $ingredientes . "" . $ingrediente . ",";
            }
        }
        Ticket::anadirPlatoTicket($_SESSION['ticketActual'], $_POST['idPlato'], $ingredientes);
        Ticket::actualizarTicket($_SESSION['ticketActual']);
        include 'restaurante/menu.php';
        echo "<script type='text/javascript'>
            swal('Añadido!', 'Plato añadido al ticket', 'success');
        </script>";
    } elseif (isset($_POST['idPlato'])) {
        include 'restaurante/platoSeleccion.php';
    } elseif (isset($_POST['categoriaSubNav'])) {
        include 'restaurante/menuCategorias.php';
    } elseif (isset($_POST['platosSubNav'])) {
        include 'restaurante/menu.php';
    } elseif (isset($_POST['ticketSubNav'])) {
        include 'restaurante/ticket.php';
    } elseif (isset($_POST['platos'])) {
        include 'restaurante/platos.php';
        echo "<script type='text/javascript'> $('navPlatos').style.background = 'black'; "
        . " origenFormProductos('platos'); </script>";
    } elseif (isset($_POST['guardarPlatos'])) {
        $ingredientesEsenciales = (isset($_POST["newIngredientesEsenciales"]))? $_POST["newIngredientesEsenciales"]: "";
        $ingredientesSimples =  (isset($_POST["newIngredientesSimples"]))? $_POST["newIngredientesSimples"]: "";      
        move_uploaded_file($_FILES['newImagen']['tmp_name'], 'img/' . $_FILES['newImagen']['name']);
        Plato::guardarPlato($_POST['newNombre'], $_POST['newPrecio'], $ingredientesEsenciales, $ingredientesSimples,
                $_POST["newCantidadEsenciales"], $_POST["newCantidadSimples"], $_POST['newDescripcion'], $_FILES['newImagen']['name'],
                1, $_POST['newCategoria'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/platos.php';
        echo "<script type='text/javascript'> $('navPlatos').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
            swal('Guardado!', 'Plato guardado correctamente', 'success');
        </script>";
    } elseif (isset($_POST['mesa']) && $_POST['accionTicket'] == '') {
        Ticket::cambiarMesaTicket($_SESSION['ticketActual'],$_POST['mesa']);
        include 'restaurante/ticket.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Cambiada!', 'Mesa cambiada', 'success');
        </script>";
    } elseif (isset($_POST['accionTicket']) && $_POST['accionTicket'] == 'cerrarTicket') {
        Ticket::cerrarTicket($_SESSION['ticketActual']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Cerrado!', 'Ticket cerrado', 'success');
        </script>";
    } elseif (isset($_POST['accionTicket']) && $_POST['accionTicket'] == 'mandarComanda') {
        Ticket::mandarComanda($_SESSION['ticketActual']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Enviada!', 'Comanda enviada', 'success');
        </script>";
    } elseif (isset($_POST['accionTicket']) && $_POST['accionTicket'] == 'anularTicket') {
        Ticket::anularTicket($_SESSION['ticketActual']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Anulado!', 'Ticket anulado', 'success');
        </script>";
    } elseif ($_POST['cerrarComanda'] = "cerrarComanda" && isset($_POST['idTicketPlato'])) {
        Ticket::cerrarComanda($_POST['idTicketPlato']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Cerrado!', 'Comanda cerrado', 'success');
        </script>";
    } elseif (isset($_POST['guardarProducto'])) {
        $esencial = (isset($_POST['newEsencial'])) ? 1 : 0;
        Producto:: guardarProducto($_POST['newEan'], $_POST['newNombre'], $_POST['newCantidad'], $_POST['newCaducidad']
                , $_POST['newPrecio'], $esencial, $_POST['newMedida'], $_POST['newMerma'], $_SESSION['user']['idRestaurante']);
        if ($_POST['origenFormularioProducto'] == 'productos') {
            include 'restaurante/products.php';
            echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; </script>";
        } else {
            include 'restaurante/platos.php';
            echo "<script type='text/javascript'> $('navPlatos').style.background = 'black'; </script>";
        }
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Producto guardado', 'success');
        </script>";
    } elseif (isset($_POST['sla'])) {
        include 'restaurante/sla.php';
        echo "<script type='text/javascript'> $('navSla').style.background = 'black'; </script>";
    } elseif (isset($_POST['guardarNomina'])) {
        Factura::guardarFactura($_POST['newNumRef'], $_POST['newPago'], $_POST['newFechaPago'], $_SESSION['tipoFactura'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/factuNominas.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Nómina guardada', 'success');
        </script>";
    } elseif (isset($_POST['guardarLuz'])) {
        Factura::guardarFactura($_POST['newNumRef'], $_POST['newPago'], $_POST['newFechaPago'], $_SESSION['tipoFactura'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/factuLuz.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Factura luz guardada', 'success');
        </script>";
    } elseif (isset($_POST['guardarAgua'])) {
        Factura::guardarFactura($_POST['newNumRef'], $_POST['newPago'], $_POST['newFechaPago'], $_SESSION['tipoFactura'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/factuAgua.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Factura agua guardada', 'success');
        </script>";
    } elseif (isset($_POST['guardarGas'])) {
        Factura::guardarFactura($_POST['newNumRef'], $_POST['newPago'], $_POST['newFechaPago'], $_SESSION['tipoFactura'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/factuGas.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Factura gas guardada', 'success');
        </script>";
    } elseif (isset($_POST['guardarPublicidad'])) {
        Factura::guardarFactura($_POST['newNumRef'], $_POST['newPago'], $_POST['newFechaPago'], $_SESSION['tipoFactura'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/factuPublicidad.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Factura publicidad guardada', 'success');
        </script>";
    } elseif (isset($_POST['guardarServicio'])) {
        Factura::guardarFactura($_POST['newNumRef'], $_POST['newPago'], $_POST['newFechaPago'], $_SESSION['tipoFactura'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/factuServicios.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Factura servicio guardada', 'success');
        </script>";
    } elseif (isset($_POST['guardarImpuesto'])) {
        Factura::guardarFactura($_POST['newNumRef'], $_POST['newPago'], $_POST['newFechaPago'], $_SESSION['tipoFactura'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/factuImpuestos.php';
        echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Factura Impuestos guardada', 'success');
        </script>";
    } elseif (isset($_POST['guardarSla'])) {
        SLA::guardarSla($_POST['newNombreSla'], $_POST['newValorSla'], $_POST['newColorSla'], $_SESSION['user']['idRestaurante']);
        include 'restaurante/sla.php';
        echo "<script type='text/javascript'> $('navSla').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'SLA guardado', 'success');
        </script>";
    } elseif (isset($_POST['slaBorrado']) && $_POST['slaBorrado'] != "") {
        SLA::borrarSla($_POST['slaBorrado']);
        include 'restaurante/sla.php';
        echo "<script type='text/javascript'> $('navSla').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Borrado!', 'SLA borrado', 'success');
        </script>";
    } elseif (isset($_POST['guardarSlas']) && $_POST['slaBorrado'] == "") {
        SLA::editarSlas($_POST['newIdsSla'], $_POST['newNombreSla'], $_POST['newValor'], $_POST['newColor']);
        include 'restaurante/sla.php';
        echo "<script type='text/javascript'> $('navSla').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'SLA´s guardados', 'success');
        </script>";
    } elseif (isset($_POST['productoBorrado']) && $_POST['productoBorrado'] != "") {
        Producto::borrarProducto($_POST['productoBorrado']);
        include 'restaurante/products.php';
        echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Borrado!', 'Producto borrado', 'success');
        </script>";
    } elseif (isset($_POST['editarProductos']) && $_POST['productoBorrado'] == "") {
        Producto::editarProductos($_POST['newIds'], $_POST['newEan'], $_POST['newNombre'], $_POST['newCantidad'], $_POST['newCaducidad'], $_POST['newPrecio'], $_POST['newMedida'], $_POST['newMerma'], $_POST['newEsencial']);
        include 'restaurante/products.php';
        echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
           swal('Guardado!', 'Productos guardados', 'success');
        </script>";
    } elseif (isset($_POST['facturaBorrado']) && $_POST['facturaBorrado'] != "") {
        Factura::borrarFactura($_POST['facturaBorrado']);
        switch ($_SESSION['tipoFactura']){
            case 1:
                include 'restaurante/factuNominas.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 2:
                include 'restaurante/factuLuz.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 3:
                include 'restaurante/factuAgua.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 4:
                include 'restaurante/factuGas.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 5:
                include 'restaurante/factuPublicidad.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 6:
                include 'restaurante/factuServicios.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            default :
                include 'restaurante/home.php';
        }
        
        
        echo "<script type='text/javascript'>
           swal('Borrada!', 'Factura borrada', 'success');
        </script>";
    } elseif (isset($_POST['editarFacturas']) && $_POST['facturaBorrado'] == "") {
        Factura::editarFacturas($_POST['newIds'],$_POST['newNumRef'],$_POST['newPago'],$_POST['newFechaPago']);
        switch ($_SESSION['tipoFactura']){
            case 1:
                include 'restaurante/factuNominas.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 2:
                include 'restaurante/factuLuz.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 3:
                include 'restaurante/factuAgua.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 4:
                include 'restaurante/factuGas.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 5:
                include 'restaurante/factuPublicidad.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            case 6:
                include 'restaurante/factuServicios.php';
                echo "<script type='text/javascript'> $('navFacturacion').style.background = 'black'; </script>";
                break;
            default :
                include 'restaurante/home.php';
        }

        echo "<script type='text/javascript'>
           swal('Editadas!', 'Factura editadas correctamente', 'success');
        </script>";
    } else {
        unset($_SESSION['ticketActual']);
        unset($_SESSION['categoriaSeleccionada']);
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
    }
} else {
    if (isset($_POST['botonLogin'])) {
        $usuario = Usuario::loginUser($_POST['email'], $_POST['password']);
        if ($usuario) {
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
