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
           <div class="text-center cabeceraForm">Datos Usuario</div>
            <form action="index.php" method="POST" class="form col-xs-12 col-md-12 " id="formEditProfile" role="form">
                
                <div class="form-group row">
                    <label for="newDni" class="col-xs-1 col-md-1 form-control-label">Dni:</label>
                    <div class="col-xs-12 col-md-3">
                      <input type="text" name="newDni" class="form-control" required>
                    </div>
                    <label for="newNombre" class="col-xs-1 col-md-1 form-control-label">Nombre:</label>
                    <div class="col-xs-12 col-md-7">
                      <input type="text" name="newNombre" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newApellidos" class="col-xs-1 col-md-1 form-control-label">Apellidos:</label>
                    <div class="col-xs-12 col-md-7">
                      <input type="text" name="newApellidos" class="form-control" required>
                    </div>
                    <label for="newTelefono" class="col-xs-1 col-md-1 form-control-label">Teléfono:</label>
                    <div class="col-xs-12 col-md-3">
                      <input type="text" name="newTelefono" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newEmail" class="col-xs-1 col-md-1 form-control-label">Email:</label>
                    <div class="col-xs-12 col-md-7">
                      <input type="email" id="newEmail" name="newEmail" class="form-control" required>
                    </div>
                    <label for="newPerfil" class="col-xs-1 col-md-1 form-control-label">Perfil:</label>
                    <div class="col-xs-12 col-md-3">
                      <input type="text" name="newPerfil" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row ">
                        <input type="submit" name="editarPerfil" id="editarPerfil" value="Guardar" class="btn btn-danger col-md-offset-11"/>
                 </div>
            </form>
      </div>
  </section>
  
</body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/login.js"></script> 
    <script type="text/javascript" src="js/sweetalert.min.js"></script>    
     
</html>