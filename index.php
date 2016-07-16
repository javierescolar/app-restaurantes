
<?php
$descripcion = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
session_start();
//variables para pruebas
$mensajeLogin = "";
$datosProductos = [
    ["EAN" => "EAN1", "Nombre" => "Nombre1", "Cantidad" => "Cantidad1", "Caducidad" => "Caducidad1"],
    ["EAN" => "EAN2", "Nombre" => "Nombre2", "Cantidad" => "Cantidad2", "Caducidad" => "Caducidad2"],
    ["EAN" => "EAN3", "Nombre" => "Nombre3", "Cantidad" => "Cantidad3", "Caducidad" => "Caducidad3"],
    ["EAN" => "EAN4", "Nombre" => "Nombre4", "Cantidad" => "Cantidad4", "Caducidad" => "Caducidad4"],
    ["EAN" => "EAN5", "Nombre" => "Nombre5", "Cantidad" => "Cantidad5", "Caducidad" => "Caducidad5"],
    ["EAN" => "EAN6", "Nombre" => "Nombre6", "Cantidad" => "Cantidad6", "Caducidad" => "Caducidad6"],
    ["EAN" => "EAN7", "Nombre" => "Nombre7", "Cantidad" => "Cantidad7", "Caducidad" => "Caducidad7"],
    ["EAN" => "EAN8", "Nombre" => "Nombre8", "Cantidad" => "Cantidad8", "Caducidad" => "Caducidad8"],
];

$datosPlatos = [
    ["imagen" => "brochetas.jpg", "Nombre" => "Nombre1", "Descripcion" => $descripcion],
    ["imagen" => "combo.jpg", "Nombre" => "Nombre2", "Descripcion" => $descripcion],
    ["imagen" => "pasta.jpg", "Nombre" => "Nombre3", "Descripcion" => $descripcion],
    ["imagen" => "pollito.jpg", "Nombre" => "Nombre4","Descripcion" => $descripcion],
    ["imagen" => "brochetas.jpg", "Nombre" => "Nombre1", "Descripcion" => $descripcion],
    ["imagen" => "combo.jpg", "Nombre" => "Nombre2", "Descripcion" => $descripcion],
    ["imagen" => "pasta.jpg", "Nombre" => "Nombre3", "Descripcion" => $descripcion],
    ["imagen" => "pollito.jpg", "Nombre" => "Nombre4","Descripcion" => $descripcion],
    ["imagen" => "brochetas.jpg", "Nombre" => "Nombre1", "Descripcion" => $descripcion],
    ["imagen" => "combo.jpg", "Nombre" => "Nombre2", "Descripcion" => $descripcion],
    ["imagen" => "pasta.jpg", "Nombre" => "Nombre3", "Descripcion" => $descripcion],
    ["imagen" => "pollito.jpg", "Nombre" => "Nombre4","Descripcion" => $descripcion],
    ["imagen" => "brochetas.jpg", "Nombre" => "Nombre1", "Descripcion" => $descripcion],
    ["imagen" => "combo.jpg", "Nombre" => "Nombre2", "Descripcion" => $descripcion],
    ["imagen" => "pasta.jpg", "Nombre" => "Nombre3", "Descripcion" => $descripcion]
];

$tickets = [
    ["id" => 1,"Mesa" => 5, "Fecha" => "","Camarero" => $_SESSION["user"]["nombre"], "Total" => 75],
    ["id" => 2,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90],
    ["id" => 3,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90],
    ["id" => 4,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90],
    ["id" => 5,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90],
    ["id" => 6,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90],
    ["id" => 7,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90],
    ["id" => 8,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90],
    ["id" => 9,"Mesa" => 7,"Fecha" => "","Camarero" => $_SESSION["user"]["nombre"],"Total" => 90]
];

if (isset($_SESSION['user'])) {
    if (isset($_POST['cerrarSesion'])) {
        unset($_SESSION['user']);
        session_destroy();
        include 'restaurante/login.php';
    } elseif (isset($_POST['datosUsuario'])) {
        include 'restaurante/editProfile.php';
    } elseif (isset($_POST['editarPerfil'])) {
        include 'restaurante/editProfile.php';
        echo "<script type='text/javascript'>
            swal('Guardado!', 'Se han sobreescrito los datos', 'success');
        </script>";
    } elseif (isset($_POST['productos'])) {
        include 'restaurante/products.php';
        echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; </script>";
    } elseif (isset($_POST['saveProduct'])) {
        include 'restaurante/products.php';
        echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
          swal('Guardado!', 'Producto guardado', 'success');
      </script>";
    } elseif (isset($_POST['dropProduct'])) {
        include 'restaurante/products.php';
        echo "<script type='text/javascript'> $('navProductos').style.background = 'black'; </script>";
        echo "<script type='text/javascript'>
          swal('Borrado!', 'Producto borrado', 'success');
      </script>";
    } elseif (isset($_POST['platos'])) {
       include 'restaurante/platos.php';
        echo "<script type='text/javascript'> $('navPlatos').style.background = 'black'; </script>";
    } elseif (isset($_POST['idPlato'])) {
       include 'restaurante/platoSeleccion.php';
    } elseif (isset($_POST['crearTicket'])) {
       include 'restaurante/menu.php';
    } elseif (isset($_POST['idTicket'])) {
       include 'restaurante/ticket.php';
    } elseif (isset($_POST['volverMenu'])) {
       include 'restaurante/menu.php';
    } elseif (isset($_POST['anadirPlato'])) {
       include 'restaurante/menu.php';
       echo "<script type='text/javascript'>
            swal('Añadido!', 'Plato añadido al ticket', 'success');
        </script>";
    }  else {
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
    }
} else {
    if (isset($_POST['botonLogin'])) {
        $_SESSION['user'] = [
            "dni" => "53214567P",
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "nombre" => "Administrador",
            "apellidos" => "Admin Admin",
            "telefono" => 666999666,
            "perfil" => "Admin.Plataforma"
        ];
        include 'restaurante/home.php';
        echo "<script type='text/javascript'> $('navHome').style.background = 'black'; </script>";
    } else {
        include 'restaurante/login.php';
    }
}
?>
