<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>App - Restaurante</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="css/styles-mobile.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" type="text/css" />

    </head>

    <body>
        <div class="container-fluid">

            <?php
            include ($_SESSION['user']['perfil'] == 3)? 'restaurante/partials/navCamarero.php':'restaurante/partials/nav.php';
            include 'restaurante/partials/subNav.php';
            ?>

            <section class="cuerpo">
                
            <?php
            $x=0;
            foreach($datosPlatos as $fila){
                if($fila["Categoria"] == $_POST["categoriaSeleccionada"]){
                    echo "<form action='index.php' method='POST' onClick='this.submit()'>"; 
                    echo '<div class="col-md-4 col-xs-12 platoMenu">'
                           .'<div class="col-md-6 col-xs-6">'
                           .'<img class="img-responsive" src="img/'.$fila["imagen"].'"/>'
                        .'</div>'
                        .'<div class="col-md-6 col-xs-6">'
                            .'<h4>'.$fila["Nombre"].'</h4>'
                            .'<p>'.$fila["Descripcion"].'</p>'
                        .'</div>'
                    .'</div>';
                    echo "<input type='hidden' name='idPlato' value='$x'/>";
                    echo "</form>";
                    $x++;
                }
            }
            ?>
            </section>
            
        </div>
    </body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/mainJquery.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
</html>