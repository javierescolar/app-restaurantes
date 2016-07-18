<div class="formularios row col-xs-12 col-md-6 col-md-offset-3">

    <div class="text-center cabeceraForm">Ticket</div>
    <form action='index.php' method='POST' id="formTicket">
    <div class="form-group row col-md-12">
            <div class="form-group row">
            <label for="ticket" class="col-xs-1 col-md-1 form-control-label">Ticket:</label>
            <div class="col-xs-7 col-md-3">
                <input type="text" name="ticket" class="form-control" required disabled value="<?php echo $_SESSION['ticket']['id']; ?>">
            </div>
            <label for="mesa" class="col-md-offset-5 col-xs-1 col-md-1 form-control-label">Mesa:</label>
            <div class="col-xs-3 col-md-2">
                <input type="text" name="mesa" class="form-control" required value="<?php echo $_SESSION['ticket']['mesa']; ?>">
            </div>
            <hr>
            </div>
            <div class="form-group row">
        <?php 
        
        echo '<label for="platos" class="col-xs-1 col-md-1 form-control-label">Platos</label>
        <label for="precios" class="col-xs-1 col-md-1 col-md-offset-8 col-xs-offset-6 form-control-label">Precios</label></div>';
            foreach($platosTicket as $platos){
                echo '<div class="form-group row">';
                if($platos["idTicket"] == $_POST['idTicket']){
                foreach ($platos as $key => $plato) {
                        if($key == "plato"){
                            echo '<div class="col-xs-7 col-md-5 col-md-offset-1">';
                            echo  '<input type="text" name="plato" class="form-control" required disabled value="'.$datosPlatos[$plato]['Nombre'].'">';
                            echo '</div>';
                            echo '<div class="col-xs-3 col-md-2 col-md-offset-3">';
                            echo  '<input type="text" name="precio" class="form-control" required disabled value="'.$datosPlatos[$plato]['Precio'].'">';
                            echo '</div>';
                            echo '<div class="col-xs-2 col-md-1">';
                            echo  "<button type='submit' name='dropProduct' class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button>";
                            echo '</div>';
                        }
                    }
                }
                echo "</div>";
            }
        ?>
        <hr>
        <div class="form-group row">
            <label for="total" class="col-md-offset-8 col-xs-1 col-md-1 form-control-label">Total:</label>
            <div class="col-xs-12 col-md-3">
                <input type="text" name="total" class="form-control" required disabled value="<?php echo $_SESSION['ticket']['total']; ?>">
            </div>
        </div>
    </form>
</div>

            