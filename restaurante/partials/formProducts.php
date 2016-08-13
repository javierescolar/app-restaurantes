<div id="formFlotante">
    <div id="formFlotanteCaja">
        
        <div class="formularios row col-xs-10 col-md-10 col-md-offset-1 col-xs-offset-1">

        <div class="text-center cabeceraForm">Nuevo Productos</div>
         <button id="desactivarFromProductos" class="btn-link"><span class="drop glyphicon glyphicon-remove"></span></button>
        <form action='index.php' method='POST' id="formNuevoProducto">
           
             <button id="guardarProducto" type="submit" name="guardarProducto" class="btn-link" value="Guardar Producto"><span class="save glyphicon glyphicon-floppy-saved"></span></button>
            <div class="form-group row col-md-12">
                <div class="col-xs-12 col-md-3">
                    <label for="newEan">Ean</label>
                        <input name='newEan' id="newEan" class='form-control' type='text' value='' required/>
                </div>

                <div class="col-xs-12 col-md-6">
                    <label for="newNombre">Nombre</label>
                    <input name='newNombre' id="newNombreProducto" class='form-control' type='text' value='' required/>

                </div>
                
                <div class="col-xs-12 col-md-3">
                    <label for="newCaducidad">Caducidad</label>
                    <input name='newCaducidad' id="newCaducidad" class='form-control' type='date'  min="<?php echo date("Y-m-d"); ?>" required/>

                </div>
            </div>
            <div class="form-group row col-md-12">
                <div class="col-xs-12 col-md-2">
                    <label for="newCantidad">Cantidad</label>
                    <input name='newCantidad' id="newCantidad" class='form-control' type='text' value='' required/>

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
                    <input name='newPrecio' id="newPrecio"  class='form-control' type='text' value='' required/>

                </div>
                <div class="col-xs-12 col-md-2">
                    <label for="newPrecio">Merma</label>
                    <input name='newMerma' id="newMerma"  class='form-control' type='text' value='' required/>

                </div>
                 
                     <input id="origenFormularioProducto" type="hidden" name="origenFormularioProducto" value="">
            
            </div>    
            </form>
        </div>
         
        </div>
    </div>

<script type="text/javascript" src="js/main.js"></script>
