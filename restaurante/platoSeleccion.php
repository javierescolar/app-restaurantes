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
                <form action="index.php" method="POST">
                    <div class="col-md-12 col-xs-12">
                        <?php
                        $plato = Plato::muestraPlatoId($_POST['idPlato']);
                        $ingredientesPlato = Producto::muestraProductosPlato($_POST['idPlato']);
                        ;
                        echo "<h1 class='text-center'>" . $plato['nombre'] . "</h1>";
                        ?>

                        <div class="col-md-12 col-xs-12">

                            <?php
                            echo "<img src='img/" . $plato["imagen"] . "' class='img-responsive platoFoto'></img>";
                            echo "<h4>Ingredientes</h4>";
                            foreach ($ingredientesPlato as $ingrediente) {
                                if ($_SESSION['user']['idPerfil'] == 3 && isset($_SESSION['ticketActual'])) {
                                    if ($ingrediente['esencial'] == 0) {
                                        echo '<div class="checkbox">';
                                        echo "<label><input type='checkbox' name='ingrediente[" . $ingrediente['idProducto'] . "]' value='" . $ingrediente['idProducto'] . "'> " . $ingrediente['nombre'] . " - " . $ingrediente['cantidad'] . " " . $ingrediente['medida'] . "</label>";
                                        echo "</div>";
                                    }
                                } else {
                                    echo '<div class="checkbox">';
                                    echo "<label>". $ingrediente['nombre'] . " - " . $ingrediente['cantidad']." ". $ingrediente['medida']."</label>";
                                    echo "</div>";
                                }
                            }
                            echo "<p class='textDescripcion'>" . $plato["descripcion"] . "</p>";
                            ?>
                        </div>

                    </div>
<?php
if (isset($_SESSION['ticketActual'])) {
    ?>
                        <div class="row col-md-12 col-xs-12">

                            <input type='hidden' name='idPlato' value='<?php echo $plato["idPlato"]; ?>'/>;
                            <input type="submit" name="anadirPlatoSeleccion" value="Añadir al ticket" class="btn btn-default btn-sm  col-md-offset-10 col-md-2 col-xs-offset-1 col-xs-11"/>

                        </div>
    <?php
}
?>
                </form>
            </section>

        </div>
    </body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/mainJquery.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
</html>
