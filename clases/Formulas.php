<?php

if (isset($_POST['postproductos']) && isset($_POST['postcantidades']) && isset($_POST['postganancias'])) {
    //echo 999999;
    calculadoraEscandayo($_POST['postproductos'], $_POST['postcantidades'], $_POST['postganancias']);
} else {
    die("Solicitud no válida.");
}

function calculadoraEscandayo($productos, $cantidades, $multiploGanancia) {
    $escandayoIngredientes = 0;
    $valorNomina = 0;
    $valorLuz = 0;
    $valorAgua = 0;
    $valorGas = 0;
    $valorPublicidad = 0;
    $valorServicios = 0;
    $IVA = 0.1;
    // Escandayo de cada ingrediente.

    require_once 'BD.php';
    $bd = BD::getConexion();


    foreach ($productos as $producto) {
        foreach ($cantidades as $cantidad) {
            $select = "SELECT * FROM productos WHERE idProducto = $producto";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'productos');
            $producto = $sentencia->fetch();
            $merma = ($producto["merma"] * $cantidad ) / 100;
            $escandayoIngredientes += $escandayoIngredientes + ($cantidad * $producto["precio"] - $merma);
        }
    }
    // Cálculo de gasto de nominas mensual.
    $mes = date("m");
    $anio = date("y");

    if ($mes != 02) {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 1 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $nominas = $sentencia->fetchAll();
    } else {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 1 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $nominas = $sentencia->fetchAll();
    }


    foreach ($nominas as $nomina) {
        $nominaMediaHora = (($nomina["pago"] / 30) / 8) / 2;
        $valorNomina = $valorNomina + $nominaMediaHora;
    }


    // Cálculo de gasto de Luz mensual.

    if ($mes != 02) {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 2 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasLuz = $sentencia->fetchAll();
    } else {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 2 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasLuz = $sentencia->fetchAll();
    }

    foreach ($facturasLuz as $facturaLuz) {
        $luzMediaHora = (($facturaLuz["pago"] / 30) / 8) / 2;
        $valorLuz = $valorLuz + $luzMediaHora;
    }

    // Cálculo de gasto de Agua mensual.

    if ($mes != 02) {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 3 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasAgua = $sentencia->fetchAll();
    } else {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 3 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasAgua = $sentencia->fetchAll();
    }

    foreach ($facturasAgua as $facturaAgua) {
        $aguaMediaHora = (($facturaAgua["pago"] / 30) / 8) / 2;
        $valorAgua = $valorAgua + $aguaMediaHora;
    }
    // Cálculo de gasto de Gas mensual.

    if ($mes != 02) {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 4 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasGas = $sentencia->fetchAll();
    } else {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 4 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasGas = $sentencia->fetchAll();
    }

    foreach ($facturasGas as $facturaGas) {
        $gasMediaHora = (($facturaGas["pago"] / 30) / 8) / 2;
        $valorGas = $valorGas + $gasMediaHora;
    }
    // Cálculo de gasto de Publicidad mensual.

    if ($mes != 02) {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 5 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasPublicidad = $sentencia->fetchAll();
    } else {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 5 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasPublicidad = $sentencia->fetchAll();
    }

    foreach ($facturasPublicidad as $facturaPublicidad) {
        $publicidadMediaHora = (($facturaPublicidad["pago"] / 30) / 8) / 2;
        $valorPublicidad = $valorPublicidad + $publicidadMediaHora;
    }
    // Cálculo de gasto de Servicios mensual.

    if ($mes != 02) {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 6 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasServicios = $sentencia->fetchAll();
    } else {
        $select = "SELECT * FROM facturacion WHERE idTipoFactura = 6 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasServicios = $sentencia->fetchAll();
    }

    foreach ($facturasServicios as $facturaServicios) {
        $serviciosMediaHora = (($facturaServicios["pago"] / 30) / 8) / 2;
        $valorServicios = $valorServicios + $serviciosMediaHora;
    }

    // Suma facturas 
    $escandayoSinIVA = ($valorNomina + $valorLuz + $valorAgua + $valorGas + $valorPublicidad + $valorServicios + $escandayoIngredientes) * $multiploGanancia;
    $escandayo = $escandayoSinIVA * $IVA;


    return $escandayo;
}


?>


