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
            if (isset($_SESSION['ticketActual'])) {
                include 'restaurante/partials/subNav.php';
            }
            ?>

            <section class="cuerpo">

                <?php
                $modo = (isset($_SESSION['categoriaSeleccionada'])) ? $_SESSION['categoriaSeleccionada'] : $_POST['categoriaSeleccionada'];
                $datosPlatos = Plato::muestraPlatosCategoria($modo);
                foreach ($datosPlatos as $plato) {

                    echo '<div class="col-md-4 col-xs-12">';
                    echo "<form action='index.php' method='POST' onClick='this.submit()'>";
                    echo '<div class="row platoMenu">'
                    . '<div class="col-md-6 col-xs-6">'
                    . '<img class="img-responsive" src="img/' . $plato["imagen"] . '"/>'
                    . '</div>'
                    . '<div class="col-md-6 col-xs-6">'
                    . '<h4>' . $plato["nombre"] . '</h4>'
                    . '<p>' . $plato["descripcion"] . '</p>'
                    . '</div>'
                    . '</div>';
                    echo "<input type='hidden' name='idPlato' value='" . $plato["idPlato"] . "'/>";
                    echo "</form>";
                    if (isset($_SESSION['ticketActual'])) {
                        echo "<form action='index.php' method='POST'>";
                        echo '<div class="row">';
                        echo '<input type="submit" name="anadirPlato" value="Añadir al ticket" class="col-md-6 col-md-offset-3 col-xs-12 btn btn-default"/>';
                        echo "<input type='hidden' name='idPlato' value='" . $plato["idPlato"] . "'/>";
                        echo '</div>';
                        echo "</form>";
                    }
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