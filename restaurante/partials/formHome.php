<form action="index.php" method="POST" class="form col-xs-12 col-md-12 form-inline" role="form">
    <select name="mesa" class="form-control col-md-offset-9" required>
        <option></option>
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
    <input type="submit" name="crearTicket" id="crearTicket" value="Crear Ticket" class="btn btn-default btn-sm btn-sm"/>
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
            <h4>Total cuenta</h4>
        </div>
        <div class="col-xs-3 col-md-3 text-center">
            <h4>Tiempo</h4>
        </div>
    </div>
    <?php
    $slas = SLA::muestraSla($_SESSION['user']['idRestaurante']);
    $tickets = Ticket::muestraTickets($_SESSION['user']['idUsuario']);
    if (count($tickets) !== 0) {
        echo '<div style="background-color:white" class="form-group row formTickets">';

        echo '<div class="col-xs-3 col-md-3 text-center"></div>';
        echo '<div class="col-xs-3 col-md-3 text-center"></div>';
        echo '<div class="col-xs-3 col-md-3 text-center"></div>';
        echo '<div class="col-xs-3 col-md-3 text-center"></div>';

        echo "</div>";
        $x = 0; //SESION/ $tickets=consulta por el vendedor y si esta abierto o no
        foreach ($tickets as $ticket) {
            $aux = 0;
            $colorSLA = $slas[count($slas)-1]->getColor();
            $date1 = date_create(date("Y-m-d H:i:s"));
            $date2 = date_create($ticket['fecha']);
            $diff = date_diff($date1, $date2);
            $minutosTotales = ($diff->format("%H") * 60) + $diff->format("%I");
            for ($i = 0; $i < count($slas); $i++) {
                if ($minutosTotales < $slas[$i]->getValor() && $minutosTotales >= $aux) {
                    $colorSLA = $slas[$i]->getColor();
                    $aux = $slas[$i]->getValor();
                } else {
                    $aux = $slas[$i]->getValor();
                }
            }
            echo '<div style="background-color:' . $colorSLA . '" class="form-group row formTickets">';
            echo "<form action='index.php' method='POST' onClick='this.submit()'>";
            echo '<div class="col-xs-3 col-md-3 text-center">' . $ticket['idTicket'] . '</div>';
            echo '<div class="col-xs-3 col-md-3 text-center">' . $ticket['mesa'] . '</div>';
            echo '<div class="col-xs-3 col-md-3 text-center">' . $ticket['total'] . '</div>';
            echo '<div class="col-xs-3 col-md-3 text-center">' . $diff->format("%H:%I") . '</div>';
            echo "<input type='hidden' value='" . $ticket['idTicket'] . "'name='idTicket'/>";
            echo "</form>";
            echo "</div>";
            $x++;
        }
          echo "<br>";
    } else {
        echo "<br><br><h5 class='text-center'>No tienes ticket asignados<h5>";
    }
    ?>
</div>
