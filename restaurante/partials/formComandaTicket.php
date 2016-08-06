<?php

$datosTicket = Ticket::muestraTicketId($_SESSION['ticketActual']);
$datosPlatosTickets = Ticket::muestraPlatosTickets($_SESSION['ticketActual']);

?>
<div class="formularios row col-xs-12 col-md-6 col-md-offset-3">

    <div class="text-center cabeceraForm">Ticket <?php echo $_SESSION['ticketActual']; ?></div>
    <form action='index.php' method='POST' id="formTicket">
    <div class="form-group row col-md-12">
            <div class="form-group row">
                <div class="form-group col-xs-7 col-md-7">
                    <label for="ticket" class="col-xs-1 col-md-1 form-control-label">Ticket:</label>
                    <input type="text" name="ticket" class="form-control col-md-offset-1" required disabled value="<?php echo $datosTicket['idTicket'] ?>">
                </div>
                <div class="form-group col-xs-3 col-md-3">
                    <label for="mesa" class="col-md-offset-6 col-xs-1 col-md-1 form-control-label">Mesa:</label>
                    <input type="text" name="mesa" class="form-control col-md-offset-9" required value="<?php echo $datosTicket['mesa'] ?>">
                </div>
            
            <hr>
            </div>
            <div class="form-group row">
              <div class="form-group">  
                <label for="platos" class="col-xs-1 col-md-1 col-md-offset-1 form-control-label">Platos</label>
                <label for="terminado" class="col-xs-1 col-md-1 col-md-offset-6 col-xs-offset-6 form-control-label">Terminado</label>
                
             </div>
             </div>
        <?php 
            $i=0;
            foreach($datosPlatosTickets as $plato){
                echo "<form action='index.php' method=POST>";
                echo '<div class="form-group row">';
                    echo '<div class="form-group col-xs-7 col-md-6 col-md-offset-1">';
                        echo  '<input type="text" name="plato" class="form-control" required disabled value="'.$plato['nombre'].'">';
                        if($plato['ordenEspecial'] !== "" ){
                            $ingredientes = Producto::muestraProductosPlato($plato['ordenEspecial']);
                            foreach ($ingredientes as $ingrediente){
                              echo '<input type="text" name="orden" class="form-control col-md-offset-1 col-xs-offset-1 ordenEspecial" required disabled value="Sin '.$ingrediente['nombre'].'">';  
                            }    
                        }
                    echo '</div>';
                    echo '<div class="form-group col-xs-3 col-md-2 col-md-offset-1">';
                       if($plato['preparado'] == 0){
                            echo "<input type='checkbox' name='terminado[$i]' class='form-control' value='terminado'>";
                        } else {
                             echo "<input checked type='checkbox' name='terminado[$i]' class='form-control' value='terminado'>"; 
                        }
                    echo '</div>';
                    
                echo "</div>";
                echo  '<input type="hidden" name="idTicketPlato" value="'.$plato['idTicketPlato'].'">';
                echo "</form>";
                $i++;
            }
        ?>
        <hr>
        
        <div class="form-group row">
            
            <input type="submit" id="cerrarComanda" name="cerrarComanda" class="btn btn-danger col-md-offset-9" value="Cerrar comanda">
            <input type="hidden" id="accionTicket" name="accionTicket" value="">
        </div>
        </div>
    </form>
</div>

            
