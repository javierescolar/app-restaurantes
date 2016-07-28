<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>App - Restaurante</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="css/styles-mobile.css" type="text/css" />
        <link rel="stylesheet" href="css/sweetalert.css" type="text/css" />
    </head>

    <body>
        <div class="container-fluid">
           <?php
            include ($_SESSION['user']['idPerfil'] == 3)? 'restaurante/partials/navCamarero.php':'restaurante/partials/nav.php';
            ?>
            <section class="cuerpo">
                <div class="row col-xs-12 col-md-8 col-md-offset-2">
                    <div id="imaginary_container"> 
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control"  placeholder="Buscar producto ..." >
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                    include 'restaurante/partials/formAllProducts.php';
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
