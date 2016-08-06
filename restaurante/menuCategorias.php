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
            if (!isset($_POST['carta'])) {
                include 'restaurante/partials/subNav.php';
            }
            ?>

            <section class="cuerpo">

                <?php
                $colores = ["", "btn-primary", "btn-success", "btn-info", "btn-warning", "btn-default", "btn-default"];
                $categorias = Categoria::muestraCategorias();
                foreach ($categorias as $key => $categoria) {
                    echo '<form action="index.php" method="POST">';
                    echo '<button type=submit name="seleccionCategoria" class="categoria col-md-5 col-xs-5 col-xs-6 text-center btn ' . $colores[$categoria['idCategoria']] . '">';
                    echo '<h4>' . $categoria['nombre'] . '</h4>';
                    echo '</button>';
                    echo '<input type="hidden" name="categoriaSeleccionada" value="' . $categoria['idCategoria'] . '"/>';
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