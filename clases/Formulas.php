<?php

require_once 'BD.php';

class Formula{
    
    private $escandayoIngredientes = 0;
    private $valorNomina=0;
    private $valorLuz = 0;
    private $valorAgua = 0;
    private $valorGas = 0;
    private $valorPublicidad = 0;
    private $valorServicios = 0;
    private $IVA = 0.1;

        public function calculadoraEscandayo($productos,$cantidades,$multiploGanancia){
        
        // Escandayo de cada ingrediente.
        
        $bd = BD::getConexion();
        
        
        foreach ($productos as $producto){
            foreach ($cantidades as $cantidad){
                $select = "SELECT * FROM productos WHERE nombre = $producto";
                $sentencia = $bd->prepare($select);
                $sentencia->execute();
                $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'productos');
                $producto = $sentencia->fetchAll();
                $merma = ($producto["merma"]*$cantidad )/ 100;
                $this->escandayoIngredientes = $this->escandayoIngredientes + ($cantidad * $producto["precio"] - $merma);
            }
        }
        // Cálculo de gasto de nominas mensual.
        $mes = date("m");
        $anio = date("y");
        
        if($mes!= 02){
           $select = "SELECT * FROM facturacion WHERE idTipoFactura = 1 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $nominas = $sentencia->fetchAll(); 
        }else{
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 1 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $nominas = $sentencia->fetchAll();
            
        }
        
        
        foreach ($nominas as $nomina){
            $nominaMediaHora = (($nomina["pago"]/30)/8)/2;
            $this->valorNomina = $thuis->valorNomina + $nominaMediaHora;
        }
        
        
        // Cálculo de gasto de Luz mensual.
        
         if($mes!= 02){
           $select = "SELECT * FROM facturacion WHERE idTipoFactura = 2 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasLuz = $sentencia->fetchAll(); 
        }else{
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 2 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasLuz= $sentencia->fetchAll();
            
        }
        
        foreach ($facturasLuz as $facturaLuz){
            $luzMediaHora = (($facturaLuz["pago"]/30)/8)/2;
            $this->valorLuz = $this->valorLuz + $luzMediaHora;
        }
        
        // Cálculo de gasto de Agua mensual.
        
        if($mes!= 02){
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 3 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasAgua = $sentencia->fetchAll(); 
        }else{
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 3 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
        $facturasAgua= $sentencia->fetchAll();
            
        }
        
        foreach ($facturasAgua as $facturaAgua){
            $aguaMediaHora = (($facturaAgua["pago"]/30)/8)/2;
            $this->valorAgua = $this->valorAgua + $aguaMediaHora;
        }
        // Cálculo de gasto de Gas mensual.
        
        if($mes!= 02){
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 4 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasGas = $sentencia->fetchAll(); 
        }else{
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 4 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasGas = $sentencia->fetchAll();
            
        }
        
        foreach ($facturasGas as $facturaGas){
            $gasMediaHora = (($facturaGas["pago"]/30)/8)/2;
            $this->valorGas = $this->valorGas + $gasMediaHora;
        }
        // Cálculo de gasto de Publicidad mensual.
        
        if($mes!= 02){
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 5 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasPublicidad = $sentencia->fetchAll(); 
        }else{
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 5 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasPublicidad = $sentencia->fetchAll();
            
        }
        
        foreach ($facturasPublicidad as $facturaPublicidad){
            $publicidadMediaHora = (($facturaPublicidad["pago"]/30)/8)/2;
            $this->valorPublicidad = $this->valorPublicidad + $publicidadMediaHora;
        }
        // Cálculo de gasto de Servicios mensual.
        
        if($mes!= 02){
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 6 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-30";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasServicios = $sentencia->fetchAll(); 
        }else{
            $select = "SELECT * FROM facturacion WHERE idTipoFactura = 6 AND fechaPago BETWEEN $anio-$mes-01 AND $anio-$mes-28";
            $sentencia = $bd->prepare($select);
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'facturacion');
            $facturasServicios = $sentencia->fetchAll();
            
        }
        
        foreach ($facturasServicios as $facturaServicios){
            $serviciosMediaHora = (($facturaServicios["pago"]/30)/8)/2;
            $this->valorServicios = $this->valorServicios + $serviciosMediaHora;
        }
        
        // Suma facturas 
        $escandayoSinIVA = ($this->valorNomina + $this->valorLuz + $this->valorAgua + $this->valorGas + $this->valorPublicidad + $this->valorServicios + $this->escandayoIngredientes) * $multiploGanancia;
        $escandayo =  $escandayoSinIVA * $this->IVA;
        
        
        return $escandayo;
        
    }
    
    function getEscandayoIngredientes() {
        return $this->escandayoIngredientes;
    }

    function getValorNomina() {
        return $this->valorNomina;
    }

    function getValorLuz() {
        return $this->valorLuz;
    }

    function getValorAgua() {
        return $this->valorAgua;
    }

    function getValorGas() {
        return $this->valorGas;
    }

    function getValorPublicidad() {
        return $this->valorPublicidad;
    }

    function getValorServicios() {
        return $this->valorServicios;
    }

    function getIVA() {
        return $this->IVA;
    }

    function setEscandayoIngredientes($escandayoIngredientes) {
        $this->escandayoIngredientes = $escandayoIngredientes;
    }

    function setValorNomina($valorNomina) {
        $this->valorNomina = $valorNomina;
    }

    function setValorLuz($valorLuz) {
        $this->valorLuz = $valorLuz;
    }

    function setValorAgua($valorAgua) {
        $this->valorAgua = $valorAgua;
    }

    function setValorGas($valorGas) {
        $this->valorGas = $valorGas;
    }

    function setValorPublicidad($valorPublicidad) {
        $this->valorPublicidad = $valorPublicidad;
    }

    function setValorServicios($valorServicios) {
        $this->valorServicios = $valorServicios;
    }

    function setIVA($IVA) {
        $this->IVA = $IVA;
    }

}

?>


