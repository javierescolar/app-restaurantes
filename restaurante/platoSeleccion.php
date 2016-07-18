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
               <div class="col-md-12 col-xs-12">
                   <?php
                    echo "<h1 class='text-center'>".$datosPlatos[$_POST['idPlato']]['Nombre']."</h1>";
                    ?>
                   <div class="col-md-12 col-xs-12">
                       
                    <?php
                        echo  "<img src='img/".$datosPlatos[$_POST["idPlato"]]["imagen"]."' class='img-responsive platoFoto'></img>";
                        echo "<p class='textDescripcion'>".$datosPlatos[$_POST["idPlato"]]["Descripcion"]."</p>";
                    ?> 
                   </div>
                       
               </div>
                <div class="row col-md-12 col-xs-12">
                    <form action="index.php" method="POST">
                        <input type="submit" name="anadirPlato" value="Añadir al ticket" class="btn btn-danger col-md-offset-10 col-md-2 col-xs-offset-1 col-xs-11"/>
                    </form>
                </div>
            
            </section>
            
        </div>
    </body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/mainJquery.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
</html>