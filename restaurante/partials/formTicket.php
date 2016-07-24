<?php

$datosTicket = Ticket::muestraTicketId($_SESSION['ticketActual']);
$datosPlatosTickets = Ticket::muestraPlatosTickets($_SESSION['ticketActual']);

?>
<div class="formularios row col-xs-12 col-md-6 col-md-offset-3">

    <div class="text-center cabeceraForm">Ticket <?php echo $_SESSION['ticketActual']; ?></div>
    <form action='index.php' method='POST' id="formTicket">
    <div class="form-group row col-md-12">
            <div class="form-group row">
            <label for="ticket" class="col-xs-1 col-md-1 form-control-label">Ticket:</label>
            <div class="col-xs-7 col-md-3">
                <input type="text" name="ticket" class="form-control" required disabled value="<?php echo $datosTicket['idTicket'] ?>">
            </div>
            <label for="mesa" class="col-md-offset-5 col-xs-1 col-md-1 form-control-label">Mesa:</label>
            <div class="col-xs-3 col-md-2">
                <input type="text" name="mesa" class="form-control" required value="<?php echo $datosTicket['mesa'] ?>">
            </div>
            <hr>
            </div>
            <div class="form-group row">
        <?php 
        
        echo '<label for="platos" class="col-xs-1 col-md-1 form-control-label">Platos</label>
        <label for="precios" class="col-xs-1 col-md-1 col-md-offset-8 col-xs-offset-6 form-control-label">Precios</label></div>';
            foreach($datosPlatosTickets as $plato){
                echo "<form action='index.php' method=POST>";
                echo '<div class="form-group row">';               
                    echo '<div class="col-xs-7 col-md-5 col-md-offset-1">';
                    echo  '<input type="text" name="plato" class="form-control" required disabled value="'.$plato['nombre'].'">';
                    if($plato['ordenEspecial'] !== "" ){
                        $ingredientes = Producto::muestraProductosPlato($plato['ordenEspecial']);
                        foreach ($ingredientes as $ingrediente){
                          echo '<input type="text" name="orden" class="form-control col-md-offset-1 ordenEspecial" required disabled value="'.$ingrediente['nombre'].'">';  
                        }    
                    }
                    echo '</div>';
                    echo '<div class="col-xs-3 col-md-2 col-md-offset-3">';
                    echo  '<input type="text" name="precio" class="form-control" required disabled value="'.$plato['precio'].'">';
                    echo '</div>';
                    echo '<div class="col-xs-2 col-md-1">';
                    echo  '<input type="hidden" name="idTicketPlato" value="'.$plato['idTicketPlato'].'">';
                    echo  "<button type='submit' name='dropPlato' class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button>";
                    echo '</div>';
                echo "</div>";
                echo "</form>";
            }
        ?>
        <hr>
        <div class="form-group row">
            <label for="total" class="col-md-offset-8 col-xs-1 col-md-1 form-control-label">Total:</label>
            <div class="col-xs-12 col-md-3">
                <input type="text" name="total" class="form-control" required disabled value="<?php echo $datosTicket['total']; ?>">
            </div>
        </div>
    </form>
</div>

            