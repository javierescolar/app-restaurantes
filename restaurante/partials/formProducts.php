<div id="formFlotante">
    <div id="formFlotanteCaja">
        <button class="col-md-offset-11 drop btn-link" id="desactivarFromProductos"><span class="glyphicon glyphicon-remove"></span></button>
        <div class="formularios row col-xs-12 col-md-10 col-md-offset-1">

        <div class="text-center cabeceraForm">Productos</div>
        <form action='index.php' method='POST' id="formProductos">
            <div class="form-group row col-md-12 cabeceraProductos">
                <div class="col-xs-12 col-md-2">
                    <label for="newEan">Ean</label>
                        <input name='newEan' class='form-control' type='text' value='' required/>
                </div>

                <div class="col-xs-12 col-md-3">
                    <label for="newNombre">Nombre</label>
                    <input name='newNombre' class='form-control' type='text' value='' required/>

                </div>
                <div class="col-xs-12 col-md-1">
                    <label for="newCantidad">Cantidad</label>
                    <input name='newCantidad' class='form-control' type='text' value='' required/>

                </div>
                <div class="col-xs-12 col-md-2">
                    <label for="newCaducidad">Caducidad</label>
                    <input name='newCaducidad' class='form-control' type='date' value='' required/>

                </div>
                <div class="col-xs-12 col-md-1">
                    <label for="newPrecio">Precio</label>
                    <input name='newPrecio' class='form-control' type='text' value='' required/>

                </div>
                <div class="col-xs-12 col-md-2">
                    <label for="newCategoria">Categoria</label>
                        <select name="newCategoria" class="form-control" required>
                            <option></option>
                            <?php $categorias = Categoria::muestraCategorias();
                                foreach ($categorias as $categoria){
                                    echo "<option value='".$categoria['idCategoria']."'>".$categoria['nombre']."</option>";
                                }
                            ?>
                        </select>

                </div>
                <div class="col-xs-12 col-md-1">
                    <label for="newMedida">Medida</label>
                        <select name="newMedida" class="form-control" required>
                            <option></option>
                            <?php $medidas = Medida::muestraMedidas();
                                foreach ($medidas as $medida){
                                    echo "<option value='".$medida['idMedida']."'>".$medida['nombre']."</option>";
                                }
                            ?>
                        </select>

                </div>
            </div>
            <div class="form-group row">
                <input type="submit" class="btn btn-danger col-md-offset-9" name="guardarProductoPlato" value="Guardar Producto">
            </div>
            </form>
         
        </div>
    </div>
</div>
<script type="text/javascript" src="js/main.js"></script>
