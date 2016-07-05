<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title of the document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <link rel="stylesheet" href="css/styles-mobile.css" type="text/css" />
</head>

<body>
<div class="container-fluid">
  <img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive logo" alt="" />
  <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" 
            data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">Platos</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Inventario</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" id="search"role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?php echo " ".$_SESSION['user']['email']." "; ?><span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><form action="index.php" method="POST">
               <button class="btn-link" type="submit" name="datosUsuario">Datos usuario <span class="glyphicon glyphicon-pencil"></span></button>
            </li>
            <li>
              <form action="index.php" method="POST">
                <button class="btn-link" type="submit" name="cerrarSesion">Desconectar <span class="glyphicon glyphicon-log-out"></span></button>
              </form>
              </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <section class="cuerpo">
    <form action="index.php" method="POST">
        <div class="form-group row">
            <label for="newEmail" class="col-sm-2 form-control-label">Email:</label>
            <div class="col-sm-10">
              <input type="email" name="newEmail" class="form-control" required>
            </div>
        </div>
        <input type="submit" name="editarPerfil" value="Guardar"/>
    </form>
    
  </section>
  <footer class="pie col-md-12 text-center col-xs-12">
    
      <ul>
        <li><a href="#">Elemento del footer</a></li>
        <li><a href="#">Elemento del footer</a></li>
        <li><a href="#">Elemento del footer</a></li>
        <li><a href="#">Elemento del footer</a></li>
      </ul>

  </footer>
  <div id="marcaLegal"><p>@copyright 2016</p></div>
</body>
    <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</html>