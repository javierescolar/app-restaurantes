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
                           ["EAN1","Nombre1","Cantidad1","Caducidad1"],
                           ["EAN2","Nombre2","Cantidad2","Caducidad2"],
                           ["EAN3","Nombre3","Cantidad3","Caducidad3"]
                       ];
                       foreach ($datosProductos as $fila) {
                           echo "<tr>";
                          foreach ($fila as $celda) {
                             echo "<td><input class='form-control' type='text'value='$celda'/></td>";
                          }
                          echo "<td><button class='btn-link save'><span class='glyphicon glyphicon-ok'></span></button></td>"
                               ."<td><button class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button></td>"
                               ."</tr>";
                       }
               
                   ?>
               </tbody>
              
           </table>
           <div class="btn-link" id="nuevoProducto">añadir nuevo producto</div>
      </div>
  </section>
  
</body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/mainJquery.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>    
     
</html>