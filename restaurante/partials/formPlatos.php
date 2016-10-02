<div class="formularios row col-xs-12 col-xs-12 col-md-10 col-md-offset-1">

    <div class="text-center cabeceraForm">Nuevo Plato</div>
    <form action="index.php" method="POST" class="form col-xs-12 col-md-12 " id="formPlatos" role="form" enctype="multipart/form-data">
        <button id="guardarPlatos" type="submit" name="guardarPlatos" class="btn-link" value="Guardar Plato"><span class="save glyphicon glyphicon-floppy-saved"></span></button>

        <div class="form-group row col-md-12">
            <div class="form-group col-md-6 col-xs-12">
                <label for="newCategoria" class="col-xs-1 col-md-1 form-control-label">Categoría:</label>
                <select name="newCategoria" class="form-control" required>
                    <option></option>
                    <?php
                    $categorias = Categoria::muestraCategorias();
                    foreach ($categorias as $categoria) {
                        echo "<option value=" . $categoria['idCategoria'] . ">" . $categoria['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <label for="newNombre" class="col-xs-1 col-md-1 form-control-label">Nombre:</label>

                <input type="text" name="newNombre" class="form-control" required>

            </div>

        </div>


        <div class="form-group row  col-md-6">

            <div class="form-group row"> 
                <label class="col-md-offset-1">Ingredientes Esenciales:</label>
            </div>
            <?php
            $esencial = 1;
            $productos = Producto::muestraProductosEsenciales($esencial);
            $i = 0;
            foreach ($productos as $producto) {
                echo '<div class="form-group col-md-6 col-md-offset-1">';
                echo '<label class = "custom-control custom-checkbox">';
                echo "<input name='newIngredientesEsenciales[$i]' type ='checkbox' class ='custom-control-input IngredientesEsenciales' value='" . $producto["idProducto"] . "'>";
                echo '<span class = "custom-control-indicator"></span>';
                echo '<span class = "custom-control-description"> ' . $producto['nombre'] . '</span>';
                echo '</label>';
                //echo "<input type='checkbox' name='newIngredientesEsenciales[$i]' class='form-control' value='" . $producto["idProducto"] . "'>";
                echo '</div>';
                echo '<div class="form-group col-md-3">';
                echo "<input type='number' name='newCantidadEsenciales[$i]' class='form-control CantidadEsenciales' value=''>";
                echo '</div>';
                echo '<div class="form-group col-md-2">';
                echo "<input type='text'  class='form-control' value='" . $producto['nombreMedida'] . "' readonly>";
                echo '</div>';
                $i++;
            }
            ?>

        </div>
        <div class="form-group row  col-md-6">

            <div class="form-group row"> 
                <label class="col-md-offset-1">Ingredientes Simples:</label>
            </div>
            <?php
            $esencial = 0;
            $productos = Producto::muestraProductosEsenciales($esencial);
            foreach ($productos as $producto) {
                echo '<div class="form-group col-md-6 col-md-offset-1">';
                echo '<label class = "custom-control custom-checkbox">';
                echo "<input name='newIngredientesSimples[$i]' type ='checkbox' class ='custom-control-input IngredientesSimples' value='" . $producto["idProducto"] . "'>";
                echo '<span class = "custom-control-indicator"></span>';
                echo '<span class = "custom-control-description"> ' . $producto['nombre'] . '</span>';
                echo '</label>';
                // echo "<label>" . $producto['nombre'] . "</label><input type='checkbox' name='newIngredientesSimples[$i]' class='form-control' value='" . $producto["idProducto"] . "'>";
                echo '</div>';
                echo '<div class="form-group col-md-3">';
                echo "<input type='number' name='newCantidadSimples[$i]' class='form-control CantidadSimples' value=''>";
                echo '</div>';
                echo '<div class="form-group col-md-2">';
                echo "<input type='text'  class='form-control' value='" . $producto['nombreMedida'] . "' readonly>";
                echo '</div>';
                $i++;
            }
            ?>

        </div>
        <div class="row"></div>
        <div class="form-group row col-md-6 col-xs-12">
            <div class="form-group col-xs-12 col-md-12">
                <label for="newDescripcion" class="col-xs-1 col-md-1 form-control-label">Descripción:</label>
                <br>
                <textarea rows="6" name="newDescripcion" class="form-control" required ></textarea>

            </div>

        </div>
        <div class="form-group row col-md-6 col-xs-12">
            <div class="form-group">
                <label for="newImagen" class="col-xs-1 col-md-1 form-control-label">Imagen:</label>
                <input type="file" id="newImagen" name="newImagen" accept="imagen/*" class="form-control" required/>
            </div>
            <div class="form-group col-md-6">

                <label for="newPrecio" class="col-xs-1 form-control-label">Precio Recomendado:</label>

                <input type="text" id="precioEscandayoRecomendado" class="form-control" value="" readonly>
                <p onclick="postEscandayo()" class="btn btn-primary">Calcular</p>
            </div>
            <div class="form-group col-md-6">
                <label for="newPrecio" class="col-xs-1 form-control-label">Precio Total:</label>

                <input type="text" name="newPrecio" class="form-control" required value="">

            </div>
            





        </div>
    </form>
    <button id="activarFromProductos" class="btn-link">Alta Producto</button> 
</div>
