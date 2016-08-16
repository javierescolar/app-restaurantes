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
                    
                    <select onChange="this.form.submit()" name="mesa" class="form-control col-md-offset-9">
                        <option  selected value='<?php echo $datosTicket['mesa']?>'>Mesa <?php echo $datosTicket['mesa']?></option>
                        <?php
                        $numeroMesas = Restaurante::cargarMesas($_SESSION['user']['idRestaurante']);
                        $mesasOcupadas = Ticket::mesasOcupadas($_SESSION['user']['idRestaurante']);
                        for ($i = 1; $i <= $numeroMesas; $i++) {
                            $ocupada = false;
                            foreach ($mesasOcupadas as $mesa) {
                                if (in_array($i, $mesa)) {
                                    $ocupada = true;  
                                }
                            }
                            if (!$ocupada) {

                                echo "<option value='$i'>Mesa $i</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <hr>
            </div>
            <div class="form-group row">
                <div class="form-group">  
                    <label for="platos" class="col-xs-1 col-md-1 col-md-offset-1 form-control-label">Platos</label>
                    <label for="precios" class="col-xs-1 col-md-1 col-md-offset-6 col-xs-offset-6 form-control-label">Precios</label>

                </div>
            </div>
            <?php
            foreach ($datosPlatosTickets as $plato) {
                echo "<form action='index.php' method=POST>";
                echo '<div class="form-group row">';
                echo '<div class="form-group col-xs-7 col-md-6 col-md-offset-1">';
                echo '<input type="text" name="plato" class="form-control" required disabled value="' . $plato['nombre'] . '">';
                if ($plato['ordenEspecial'] !== "") {

                    $ingredientes = Producto::muestraProductosOrdenEspecial($plato['ordenEspecial']);
                    foreach ($ingredientes as $ingrediente) {
                        echo '<input type="text" name="orden" class="form-control col-md-offset-1 col-xs-offset-1 ordenEspecial" required disabled value="Sin ' . $ingrediente['nombre'] . '">';
                    }
                }
                echo '</div>';
                echo '<div class="form-group col-xs-3 col-md-2 col-md-offset-1">';
                echo '<input type="text" name="precio" class="form-control" required disabled value="' . $plato['precio'] . '">';
                echo '</div>';
                echo '<div class="from-group col-xs-2 col-md-1">';
                echo '<input type="hidden" name="idTicketPlato" value="' . $plato['idTicketPlato'] . '">';
                echo "<button type='submit' name='dropPlato' class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button>";
                echo '</div>';
                echo "</div>";
                echo "</form>";
            }
            ?>
            <hr>
            <div class="form-group row">
                <div class="col-md-offset-7 col-xs-offset-6 col-md-4 col-xs-4">
                    <label for="total" class="col-md-offset-4 col-xs-offset-3 col-xs-1 col-md-1 form-control-label">Total:</label>
                    <input type="text" name="total" class="form-control col-md-offset-6 col-xs-offset-5" required disabled value="<?php echo $datosTicket['total']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <input type="submit" id="anularTicket" name="anularTicket" class="btn btn-default btn-sm  btn-sm  btn-sm btn-sm  col-md-offset-2" value="Anular Ticket">
                <input type="submit" id="mandarComanda" name="mandarComanda" class="btn btn-default btn-sm  btn-sm  btn-sm btn-sm col-md-offset-1" value="Mandar Comanda">
                <input type="submit" id="cerrarTicket" name="cerrarTicket" class="btn btn-default btn-sm  btn-sm  btn-sm btn-sm col-md-offset-1" value="Cerrar Ticket">
                <input type="hidden" id="accionTicket" name="accionTicket" value="">

            </div>
    </form>
</div>

