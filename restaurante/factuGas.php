<!DOCTYPE html>
<html>

    <head>
        <?php
        include 'restaurante/partials/head.php';
       ?>
    </head>

    <body>
        <div class="container-fluid">
            <?php
            if ($_SESSION['user']['idPerfil'] == 3) {
                include 'restaurante/partials/navCamarero.php';
            } else if ($_SESSION['user']['idPerfil'] == 4) {
                include 'restaurante/partials/navCocina.php';
            } else {
                include 'restaurante/partials/nav.php';
            }
            ?>
            <section class="cuerpo">
                
                <?php
                    include 'restaurante/partials/formAllGas.php';  
                    include 'restaurante/partials/formGas.php';   
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

