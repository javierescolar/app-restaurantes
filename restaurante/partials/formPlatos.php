<div class="formularios row col-xs-12 col-xs-12 col-md-10 col-md-offset-1">
    <div class="text-center cabeceraForm">Datos Plato</div>
    <form action="index.php" method="POST" class="form col-xs-12 col-md-12 " id="formPlatos" role="form" enctype="multipart/form-data">

        <div class="form-group row">
            <div class="form-group col-md-9 col-xs-12">
                <label for="newNombre" class="col-xs-1 col-md-1 form-control-label">Nombre:</label>

                <input type="text" name="newNombre" class="form-control" required>

            </div>
            <div class="form-group col-md-3 col-xs-12">
                <label for="newPrecio" class="col-xs-1 col-md-1 form-control-label">Precio:</label>

                <input type="text" name="newPrecio" class="form-control" required value="">

            </div>
        </div>
        <div class="form-group row">
            <label for="newIngredientes" class="col-xs-1 col-md-1 form-control-label">Ingredientes:</label><br> 
        </div>
        <div class="form-group row">
            <div class="col-xs-12 col-md-5 col-md-offset-1">
                <label for="newIngredientesEsenciales" class="col-xs-1 col-md-1 form-control-label">Esenciales:</label>
                <br>
                <?php
                $esencial = 1;
                $productos = Producto::muestraProductosEsenciales($esencial);
                $i = 0;
                foreach ($productos as $producto) {
                    echo '<div class="checkbox">';
                    echo "<label><input type='checkbox' name='newIngredientesEsenciales[$i]' class='form-control' value='" . $producto["idProducto"] . "'>" . $producto["nombre"] . "</label>";
                    $i++;
                    echo '</div>';
                }
                ?>
            </div>
            <div class="col-xs-12 col-md-5 col-md-offset-1">
                <label for="newIngredientesSimples" class="col-xs-1 col-md-1 form-control-label">Simples:</label>
                <br>
                <?php
                $esencial = 0;
                $productos = Producto::muestraProductosEsenciales($esencial);
                foreach ($productos as $producto) {
                    echo '<div class="checkbox">';
                    echo "<label><input type='checkbox' name='newIngredientesSimples[$i]' class='form-control' value='" . $producto["idProducto"] . "'>" . $producto["nombre"] . "</label>";
                    $i++;
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="form-group row">
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
                <label for="newImagen" class="col-xs-1 col-md-1 form-control-label">Imagen:</label>
                <input type="file" id="newImagen" name="newImagen" accept="imagen/*" class="form-control" required/>
            </div>
        </div>
        <div class="form-group row">


            <div class="form-group col-xs-12 col-md-12">
                <label for="newDescripcion" class="col-xs-1 col-md-1 form-control-label">Descripción:</label>
                <br>
                <textarea name="newDescripcion" class="form-control" required ></textarea>

            </div>
        </div>
        <div class="form-group row">

            <input type="submit" name="guardarPlatos" class="btn btn-danger col-md-offset-10" value="Guardar Plato"/>
        </div>

    </form>
</div>