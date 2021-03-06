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
                        <button id="navHome"  type="submit" class="btn-link" name="contabilidad">contabilidad</button>
                    </form>
                </li>
                <li>
                    <form action="index.php" method="POST">
                        <button id="navPlatos" type="submit" class="btn-link" name="platos">Alta Plato</button>
                    </form>
                </li>
                <li>
                    <form action="index.php" method="POST">
                        <button id="navCarta" type="submit" class="btn-link" name="carta">Carta platos</button>
                    </form>
                </li>
                <li>
                    <form action="index.php" method="POST">
                        <button id="navProductos" type="submit" class="btn-link" name="productos">Ingredientes</button>
                    </form>
                </li>
                <li class="dropdown">
                    <a id="navFacturacion" class="dropdown-toggle userNav" data-toggle="dropdown" role="button"
                       aria-expanded="false">Facturación<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <div class="divDownMenu">
                        <li>
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="nominas">Nóminas <i class="fa fa-users" aria-hidden="true"></i></button>
                            </form>
                        
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="luz">Luz <i class="fa fa-lightbulb-o" aria-hidden="true"></i></button>
                            </form>
                        </li>
                        </div>
                        <div class="divDownMenu">
                        <li>
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="agua">Agua <i class="fa fa-tint" aria-hidden="true"></i></button>
                            </form>
                        
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="gas">Gas <i class="fa fa-fire" aria-hidden="true"></i></button>
                            </form>
                        </li>
                        </div>
                        <div class="divDownMenu">
                        <li>
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="publicidad">Publicidad<i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            </form>
                        
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="servicios">Servicios <i class="fa fa-truck" aria-hidden="true"></i></button>
                            </form>
                        </li>
                        </div>
                        <div class="divDownMenu">
                        <li>
                            <form action="index.php" method="POST">
                                <button class="btn-link" type="submit" name="impuestos">Impuestos<i class="fa fa-money" aria-hidden="true"></i></button>
                            </form>
  
                        </li>
                        </div>
                    </ul>
                </li>
                <li>
                    <form action="index.php" method="POST">
                        <button id="navSla" type="submit" class="btn-link" name="sla">SLA´s</button>
                    </form>
                </li>
                <!--
                <li>
                    <form action="index.php" method="POST">
                        <button id="navCalculadora" type="submit" class="btn-link" name="calculadora">Calculadora Escandayo</button>
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
