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
            include ($_SESSION['user']['idPerfil'] == 3)? 'restaurante/partials/navCamarero.php':'restaurante/partials/nav.php';
            include 'restaurante/partials/subNav.php';
            ?>

            <section class="cuerpo">
                
            <?php
            $datosPlatos = Plato::muestraPlatosCategoria($_POST["categoriaSeleccionada"]);
            foreach($datosPlatos as $plato){
              
                    echo '<div class="col-md-4 col-xs-12">';
                    echo "<form action='index.php' method='POST' onClick='this.submit()'>"; 
                    echo '<div class="row platoMenu">'
                           .'<div class="col-md-6 col-xs-6">'
                           .'<img class="img-responsive" src="img/'.$plato["imagen"].'"/>'
                        .'</div>'
                        .'<div class="col-md-6 col-xs-6">'
                            .'<h4>'.$plato["nombre"].'</h4>'
                            .'<p>'.$plato["descripcion"].'</p>'
                        .'</div>'
                    .'</div>';
                    echo "<input type='hidden' name='idPlato' value='".$plato["idPlato"]."'/>";
                    echo "</form>";
                    echo "<form action='index.php' method='POST'>";
                    echo '<div class="row botonPlatoMenu">';
                    echo '<input type="submit" name="anadirPlato" value="Añadir al ticket" class="col-md-6 col-md-offset-3 col-xs-12 btn btn-danger"/>';
                    echo '</div>';
                    echo "</form>";
                    echo '</div>';
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