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
      <div class="formularios row col-xs-12 col-md-8 col-md-offset-2">
          
          <div class="text-center cabeceraForm">Productos</div>
          <form action='index.php' method='POST' id="formProductos">
              <div class="form-group row col-md-offset-1 col-md-10 cabeceraProductos">
                  <div class="col-xs-12 col-md-1 col-md-offset-1">
                      <h4>EAN</h4>
                  </div>
                  <div class="col-xs-12 col-md-1 col-md-offset-1">
                      <h4>Nombre</h4>
                  </div>
                  <div class="col-xs-12 col-md-1 col-md-offset-1">
                      <h4>Cantidad</h4>
                  </div>
                  <div class="col-xs-12 col-md-1 col-md-offset-1">
                      <h4>Caducidad</h4>
                  </div>
                  <div class="col-xs-12 col-md-1 col-md-offset-1">
                      <h4>Acción</h4>
                  </div>
              </div>
               
                    <?php  
                       foreach ($datosProductos as $fila) {
                           echo '<div class="form-group row col-md-offset-1">';
                          foreach ($fila as $columna=>$celda) {
                             echo '<div class="col-xs-12 col-md-2">'; 
                             echo "<input name='$columna' class='form-control' type='text' value='$celda'/>";
                             echo '</div>';
                          }
                           echo '<div class="col-xs-12 col-md-3">';
                          echo "<button type='submit' name='saveProduct' class='btn-link save'><span class='glyphicon glyphicon-ok'></span></button>"
                               ."<button type='submit' name='dropProduct' class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button>";
                           echo '</div>';
                          echo '</div>';
                       }
                   ?>
         </form>
           <button class="btn-link" id="nuevoProducto">añadir nuevo producto</button>
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
