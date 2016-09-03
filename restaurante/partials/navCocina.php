<img src="img/<?php echo Restaurante::cargarLogo($_SESSION['user']['idRestaurante'])?>" class="img-responsive logo" alt="logo" />
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
                <li>
                    <form action="index.php" method="POST">
                         <button id="navHome"  type="submit" class="btn-link" name="home">Comanda</button>
                    </form>
                </li>
                <li>
                    <form action="index.php" method="POST">
                        <button id="navCarta" type="submit" class="btn-link" name="carta">Carta platos</button>
                    </form>
                </li>
                <li>
                    <form action="index.php" method="POST">
                        <button id="navPlatos" type="submit" class="btn-link" name="platos">Alta Plato</button>
                    </form>
                </li>
                <li>
                    <form action="index.php" method="POST">
                        <button id="navProductos" type="submit" class="btn-link" name="productos">Ingredientes</button>
                    </form>
                </li>
                <!--
                <li>
                    <form action="index.php" method="POST">
                        <button id="navCalculadora" type="submit" class="btn-link" name="calculadora">Calculadora escandayo</button>
                    </form>
                </li>
                -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--<form class="navbar-form navbar-left" id="search"role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>-->
                <li class="dropdown">
                    <a class="dropdown-toggle userNav" data-toggle="dropdown" role="button" 
                       aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?php echo " " . $_SESSION['user']['email'] . " "; ?><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="datosUsuario">Datos usuario <span class="glyphicon glyphicon-pencil"></span></button>
                            </form>
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