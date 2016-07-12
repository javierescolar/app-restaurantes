<div class="formularios row col-xs-12 col-md-10 col-md-offset-1">

    <div class="text-center cabeceraForm">Productos</div>
    <form action='index.php' method='POST' id="formProductos">
        <div class="form-group row col-md-12 cabeceraProductos">
            <div class="col-xs-12 col-md-3 text-center">
                <h4>EAN</h4>
            </div>
            <div class="col-xs-12 col-md-3 text-center">
                <h4>Nombre</h4>
            </div>
            <div class="col-xs-12 col-md-2 text-center">
                <h4>Cantidad</h4>
            </div>
            <div class="col-xs-12 col-md-3 text-center">
                <h4>Caducidad</h4>
            </div>
            <div class="col-xs-12 col-md-1 text-right">
                <h4>Acción</h4>
            </div>
        </div>

        <?php
        foreach ($datosProductos as $fila) {
            echo '<div class="form-group row">';
            foreach ($fila as $columna => $celda) {
                if($columna == "EAN"){
                    echo '<div class="col-xs-12 col-md-3">';
                    echo "<input name='$columna' class='form-control' type='text' value='$celda'/>";
                    echo '</div>';
                } elseif($columna == "Nombre"){
                    echo '<div class="col-xs-12 col-md-3">';
                    echo "<input name='$columna' class='form-control' type='text' value='$celda'/>";
                    echo '</div>';
                } elseif($columna == "Cantidad"){
                    echo '<div class="col-xs-12 col-md-2">';
                    echo "<input name='$columna' class='form-control' type='number' value='$celda'/>";
                    echo '</div>';
                } elseif($columna == "Caducidad"){
                    echo '<div class="col-xs-12 col-md-3">';
                    echo "<input name='$columna' class='form-control' type='date' value='$celda'/>";
                    echo '</div>';
                }
                
            }
            echo '<div class="col-xs-12 col-md-1">';
            echo "<button type='submit' name='saveProduct' class='btn-link save'><span class='glyphicon glyphicon-ok'></span></button>"
            . "<button type='submit' name='dropProduct' class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button>";
            echo '</div>';
            echo '</div>';
        }
        ?>
    </form>
    <button class="btn-link" id="nuevoProducto">añadir nuevo producto</button>
</div>