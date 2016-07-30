<div id="formFlotante">
    <div id="formFlotanteCaja">
        <button class="col-md-offset-11 col-xs-offset-10 drop btn-link" id="desactivarFromProductos"><span class="glyphicon glyphicon-remove"></span></button>
        <div class="formularios row col-xs-10 col-md-10 col-md-offset-1 col-xs-offset-1">

        <div class="text-center cabeceraForm">Nuevo Productos</div>
        <form action='index.php' method='POST'>
            <div class="form-group row col-md-12">
                <div class="col-xs-12 col-md-3">
                    <label for="newEan">Ean</label>
                        <input name='newEan' class='form-control' type='text' value='' required/>
                </div>

                <div class="col-xs-12 col-md-6">
                    <label for="newNombre">Nombre</label>
                    <input name='newNombre' class='form-control' type='text' value='' required/>

                </div>
                
                <div class="col-xs-12 col-md-3">
                    <label for="newCaducidad">Caducidad</label>
                    <input name='newCaducidad' class='form-control' type='date' value='' required/>

                </div>
            </div>
            <div class="form-group row col-md-12">
                <div class="col-xs-12 col-md-2">
                    <label for="newCantidad">Cantidad</label>
                    <input name='newCantidad' class='form-control' type='text' value='' required/>

                </div>
                
                <div class="col-xs-12 col-md-2">
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
                <div class="col-xs-12 col-md-2 text-center">
                    <label for="newEsencial">Esencial</label>
                    
                    <input name='newEsencial' class='form-control' type='checkbox' />

                </div>
                
                
                <div class="col-xs-12 col-md-2">
                    <label for="newPrecio">Precio</label>
                    <input name='newPrecio' class='form-control' type='text' value='' required/>

                </div>
                 <div class="col-xs-12 col-md-2 col-md-offset-2">
                     <label for="guardarProductoPlato"></label>
                <input type="submit" class="btn btn-danger" name="guardarProducto" value="Guardar Producto">
            </div>
            </div>    
            </form>
        </div>
         
        </div>
    </div>
</div>
<script type="text/javascript" src="js/main.js"></script>
