<form action="index.php" method="POST" class="form col-xs-12 col-md-12 " id="formEditProfile" role="form">
    <input type="submit" name="crearTicket" id="crearTicket" value="Crear Ticket" class="btn btn-danger col-md-offset-10"/>
</form>

<div class="formularios row col-xs-12 col-xs-12 col-md-10 col-md-offset-1">
    <div class="text-center cabeceraForm">Tickets Abiertos</div>
    <div class="form-group row col-md-12 cabeceraProductos">
            <div class="col-xs-3 col-md-3 text-center">
                <h4>Ticket</h4>
            </div>
            <div class="col-xs-3 col-md-3 text-center">
                <h4>Mesa</h4>
            </div>
            <div class="col-xs-3 col-md-3 text-center">
                <h4>Camarero</h4>
            </div>
            <div class="col-xs-3 col-md-3 text-center">
                <h4>Total</h4>
            </div>
        </div>
         <?php
         $tickets = Ticket::muestraTickets($_SESSION['user']['idUsuario']);
         $x=0;//SESION/ $tickets=consulta por el vendedor y si esta abierto o no 
         foreach($tickets as $ticket){
             echo '<div class="form-group row formTickets">';
             echo "<form action='index.php' method='POST' onClick='this.submit()'>"; 
             echo '<div class="col-xs-3 col-md-3 text-center">'.$ticket['idTicket'].'</div>';
             echo '<div class="col-xs-3 col-md-3 text-center">'.$ticket['mesa'].'</div>';
             echo '<div class="col-xs-3 col-md-3 text-center">'.$ticket['fecha'].'</div>';
             echo '<div class="col-xs-3 col-md-3 text-center">'.$ticket['total'].'</div>';
            echo "<input type='hidden' value='".$ticket['idTicket']."'name='idTicket'/>";
            echo "</form>";
            echo "</div>";
            $x++;
         }
         ?>
</div>