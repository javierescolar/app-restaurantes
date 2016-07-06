<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the document</title>
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
      <div class="formularios row col-xs-12 col-md-8 col-md-offset-2">
           <table class="table table-resposive table-collapse table-bordered">
               <tr>
                   <th>EAN</th>
                   <th>Nombre</th>
                   <th>Cantidad</th>
                   <th>Caducidad</th>
                   <th>Acción</th>
               </tr>
               <?php
                   $datosProductos[
                       ["EAN1","Nombre1","Cantidad1","Caducidad1"],
                       ["EAN2","Nombre2","Cantidad2","Caducidad2"],
                       ["EAN3","Nombre3","Cantidad3","Caducidad3"]
                   ]:
                   foreach ($datosProductos as $fila) {
                      print_r($fila);
                   }
               
               ?>
           </table>
      </div>
  </section>
  
</body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/login.js"></script> 
    <script type="text/javascript" src="js/sweetalert.min.js"></script>    
     
</html>