<div class="formularios row col-xs-12 col-md-8 col-md-offset-2">

    <div class="text-center cabeceraForm">Productos</div>
    <form action='index.php' method='POST' id="formProductos">
        <div class="form-group row col-md-offset-1 col-md-10 cabeceraProductos">
            <div class="col-xs-12 col-md-1 col-md-offset-1">
                <h4>EAN</h4>
            </div>
            <div class="col-xs-12 col-md-1 col-md-offset-1">
                <h4>Nombre</h4>
            </div>
            <div class="col-xs-12 col-md-1 col-md-offset-1">
                <h4>Cantidad</h4>
            </div>
            <div class="col-xs-12 col-md-1 col-md-offset-1">
                <h4>Caducidad</h4>
            </div>
            <div class="col-xs-12 col-md-1 col-md-offset-1">
                <h4>Acción</h4>
            </div>
        </div>

        <?php
        foreach ($datosInventario as $fila) {
            echo '<div class="form-group row col-md-offset-1">';
            foreach ($fila as $columna => $celda) {
                echo '<div class="col-xs-12 col-md-3">';
                echo "<input name='$columna' class='form-control' type='text' value='$celda'/>";
                echo '</div>';
            }
            echo '<div class="col-xs-12 col-md-3">';
            echo "<button type='submit' name='saveProduct' class='btn-link save'><span class='glyphicon glyphicon-ok'></span></button>"
            . "<button type='submit' name='dropProduct' class='btn-link drop'><span class='glyphicon glyphicon-remove'></span></button>";
            echo '</div>';
            echo '</div>';
        }
        ?>
    </form>
    <button class="btn-link" id="nuevoProducto">añadir nuevo producto</button>
</div>