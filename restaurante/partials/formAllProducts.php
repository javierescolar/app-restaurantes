<?php $productos = Producto::muestraProductos($_SESSION['user']['idRestaurante']); ?>
<div class="formularios row col-xs-12 col-md-10 col-md-offset-1">

    <div class="text-center cabeceraForm">Productos</div>
    <form action='index.php' method='POST' id="formProductos" class="listado">
        <button id="editarProductos" type="submit" name="editarProductos" class="btn-link" value='guardar'><span class="save glyphicon glyphicon-floppy-saved"></span></button>
        <div class="form-group row cabeceraProductos">
            <label class="col-xs-12 col-md-1 text-center" for="productoBorrado"></label>
            <label class="col-xs-12 col-md-2 text-center" for="newEan">Ean</label>
            <label class="col-xs-12 col-md-2 text-center" for="newNombre">Nombre</label>
            <label class="col-xs-12 col-md-1 text-center" for="newCantidad">Cantidad</label>
            <label class="col-xs-12 col-md-1 text-center" for="newMedida">Medida</label>
            <label class="col-xs-12 col-md-2 text-center" for="newCaducidad">Caducidad</label>
            <label class="col-xs-12 col-md-1 text-center" for="newPrecio">Precio</label>
            <label class="col-xs-12 col-md-1 text-center" for="newMerma">Merma</label>
            <label class="col-xs-12 col-md-1 text-center" for="newEsencial">Esencial</label>
            
        </div>
        <?php
        $x=0;
        foreach ($productos as $producto) {
            ?>
            <div class="form-group row">
                <div class="col-xs-12 col-md-1 text-center"> 
                    <button type="submit" onclick="borrarIngrediente(this.getAttribute('data-productoborrado'));"  data-productoborrado="<?php echo $producto['idProducto'] ?>" class="btn-link"><span class="drop glyphicon glyphicon-trash drops"></span></button>
                </div>
                <input name='<?php echo "newIds[$x]"; ?>' type='hidden' value="<?php echo $producto['idProducto'] ?>"/>
                <div class="col-xs-12 col-md-2">
                    <input name='<?php echo "newEan[$x]"; ?>' class='form-control' type='text' value="<?php echo $producto['ean'] ?>" required/>
                </div>

                <div class="col-xs-12 col-md-2">
                    <input name='<?php echo "newNombre[$x]"; ?>' class='form-control' type='text' value='<?php echo $producto['nombre'] ?>' required/>
                </div>
                <div class="col-xs-12 col-md-1">
                    <input name='<?php echo "newCantidad[$x]"; ?>' class='form-control' type='text' value='<?php echo $producto['cantidad'] ?>' required/>
                </div>
                <div class="col-xs-12 col-md-1">                
                    <select name="<?php echo "newMedida[$x]"; ?>" class="form-control" required>
                        <option></option>
                        <?php
                        $medidas = Medida::muestraMedidas();
                        foreach ($medidas as $medida) {
                            if ($medida['idMedida'] == $producto['idMedida']) {
                                echo "<option value='" . $medida['idMedida'] . "' selected>" . $medida['nombre'] . "</option>";
                            } else {
                                echo "<option value='" . $medida['idMedida'] . "'>" . $medida['nombre'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12 col-md-2">
                    <input name='<?php echo "newCaducidad[$x]"; ?>' class='form-control' type='date' value='<?php echo $producto['caducidad'] ?>' required/>
                </div>
                <div class="col-xs-12 col-md-1">
                    <input name='<?php echo "newPrecio[$x]"; ?>' class='form-control' type='text' value='<?php echo $producto['precio'] ?>' required/>
                </div>

                
                <div class="col-xs-12 col-md-1">
                    <input name='<?php echo "newMerma[$x]"; ?>' class='form-control' <input type="text" value='<?php echo $producto['merma'] ?>' required/>
                </div>
                <div class="col-xs-12 col-md-1 text-center"> 
                    <?php
                    if($producto['esencial'] == 1){
                        echo "<input name='newEsencial[$x]' class='form-control' type='checkbox' checked/>";
                    } else {
                         echo "<input name='newEsencial[$x]' class='form-control' type='checkbox'/>";
                    }
                    ?>
                </div>
                
            </div>
            <?php
            $x++;
        }
        ?>
        
        
        <input id="productoBorrado" name='productoBorrado' type='hidden' value="" />
    </form>
    <button id="activarFromProductos" class="btn-link">Alta Producto</button> 
</div>