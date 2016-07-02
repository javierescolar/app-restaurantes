
<?php
$mensajeLogin = "";


if($_SESSION['user']){
    include 'restaurante/menu.php';
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