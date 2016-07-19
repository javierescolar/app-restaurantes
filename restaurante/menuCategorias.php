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
            ?>

            <section class="cuerpo">
                
                <?php
                $colores = ["btn-primary", "btn-success", "btn-info", "btn-warning", "btn-danger", "btn-default"];
                   foreach ($categorias as $key=>$categoria) {
                       echo '<form action="index.php" method="POST">';
                        echo '<button type=submit name="seleccionCategoria" class="categoria col-md-5 col-xs-5 col-xs-6 text-center btn '.$colores[$key - 1] .'">';
                            echo '<h4>'.$categoria.'</h4>';
                        echo '</button>';
                        echo '<input type="hidden" name="categoriaSeleccionada" value="'.$key.'"/>';
                        echo '</form>';
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