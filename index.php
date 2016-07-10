
<?php

session_start();
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
    } elseif (isset($_POST['saveProduct'])) {
        include 'restaurante/products.php';
        echo "<script type='text/javascript'>
          swal('Guardado!', 'Producto guardado', 'success');
      </script>";
    } elseif (isset($_POST['dropProduct'])) {
        include 'restaurante/products.php';
        echo "<script type='text/javascript'>
          swal('Borrado!', 'Producto borrado', 'success');
      </script>";
    } else {
        include 'restaurante/menu.php';
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
        include 'restaurante/menu.php';
    } else {
        include 'restaurante/login.php';
    }
}
?>
