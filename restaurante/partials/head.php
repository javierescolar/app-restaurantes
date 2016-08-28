<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>App - Restaurante</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link rel="stylesheet" href="css/styles-mobile.css" type="text/css" />
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" type="text/css" />
<link rel="stylesheet" href="css/<?php echo Restaurante::cargarCSS($_SESSION['user']['idRestaurante'])?>" type="text/css" />
<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
 <script  src="http://code.responsivevoice.org/responsivevoice.js"></script>