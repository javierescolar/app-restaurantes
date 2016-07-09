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
          <div class="text-center cabeceraForm">Productos</div>
          <form action='index.php' method='POST'>
           <table class="table table-resposive table-condensed table-hover" id="tablaProductos">
               <thead>
                   <tr>
                       <th class="text-center">EAN</th>
                       <th class="text-center">Nombre</th>
                       <th class="text-center">Cantidad</th>
                       <th class="text-center">Caducidad</th>
                       <th class="text-center" colspan="2">Acción</th>
                   </tr>
               </thead>
               <tbody>
                    <?php
                       $datosProductos = [
                           ["EAN"=>"EAN1","Nombre"=>"Nombre1","Cantidad"=>"Cantidad1","Caducidad"=>"Caducidad1"],
                           ["EAN"=>"EAN2","Nombre"=>"Nombre2","Cantidad"=>"Cantidad2","Caducidad"=>"Caducidad2"],
                           ["EAN"=>"EAN3","Nombre"=>"Nombre3","Cantidad"=>"Cantidad3","Caducidad"=>"Caducidad3"],
                           ["EAN"=>"EAN4","Nombre"=>"Nombre4","Cantidad"=>"Cantidad4","Caducidad"=>"Caducidad4"],
                           ["EAN"=>"EAN5","Nombre"=>"Nombre5","Cantidad"=>"Cantidad5","Caducidad"=>"Caducidad5"],
                           ["EAN"=>"EAN6","Nombre"=>"Nombre6","Cantidad"=>"Cantidad6","Caducidad"=>"Caducidad6"],
                           ["EAN"=>"EAN7","Nombre"=>"Nombre7","Cantidad"=>"Cantidad7","Caducidad"=>"Caducidad7"],
                           ["EAN"=>"EAN8","Nombre"=>"Nombre8","Cantidad"=>"Cantidad8","Caducidad"=>"Caducidad8"],
                       ];
                       foreach ($datosProductos as $fila) {
                           echo "<tr>";
                          foreach ($fila as $columna=>$celda) {
                             echo "<td><input name='$columna' class='form-control' type='text' value='$celda'/></td>";
                          }
                          echo "<td><button type='submit' name='saveProduct' class='btn-link save'><span class='glyphicon glyphicon-ok'></span></button></td>"
                               ."<td><button type='submit' name='dropProduct' class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button></td>"
                               ."</tr>";
                       }

                   ?>
               </tbody>

           </table>
         </form>
           <button class="btn-link" id="nuevoProducto">añadir nuevo producto</button>
      </div>
  </section>

</body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/mainJquery.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>

</html>
