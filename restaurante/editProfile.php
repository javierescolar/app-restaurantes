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
            include 'restaurante/partials/nav.php'
            ?>
            <section class="cuerpo">
                <?php
                include 'restaurante/partials/formProfile.php'
                ?>
            </section>
        </div>
    </body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/login.js"></script> 
    <script type="text/javascript" src="js/sweetalert.min.js"></script>    

</html>