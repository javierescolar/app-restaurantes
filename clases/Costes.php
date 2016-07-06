<?php

class Coste {
    
    private $coste=0;
    private $beneficio=0;
    
    $mysqli = new mysqli("127.0.0.1", "root", "", "apprestaurante");
    if ($mysqli->connect_errno) {
        printf("Falló la conexión: %s\n", $mysqli->connect_error);
        exit();
    }
    
    function sumaBeneficioCoste($b, $c){
        $beneficio= ($beneficio + $b)-$coste;
        $coste = $coste + $c
        $consulta = "INSERT INTO costes (beneficio,coste)
        VALUES ($beneficio, $coste);";
        if($mysqli->query($consulta) == TRUE){
            
        }else{
            echo "Error: ".$consulta."<br>".$mysqli->error;
        }
    }
    
    function muestraCosteBeneficio(){
        
        $consulta = "SELECT * FROM costes;";
        $resultado = $mysqli->query($consulta);
        while ($registro = $resultado->fetch_field()){
            $coste = $registro->coste;
            $beneficio = $registro->beneficio;
            
        }
        $resultado->close();
    }
    
    $mysqli->close();
    
}