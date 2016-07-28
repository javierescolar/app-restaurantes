<?php $productos = Producto::muestraProductos($_SESSION['user']['idRestaurante']); ?>
<div class="formularios row col-xs-12 col-md-10 col-md-offset-1">

    <div class="text-center cabeceraForm">Productos</div>
    <form action='index.php' method='POST' id="formProductos">
        <div class="form-group row cabeceraProductos">
            <label class="col-xs-12 col-md-2" for="newEan">Ean</label>
             <label class="col-xs-12 col-md-3" for="newNombre">Nombre</label>
             <label class="col-xs-12 col-md-1" for="newCantidad">Cantidad</label>
             <label class="col-xs-12 col-md-2" for="newCaducidad">Caducidad</label>
             <label class="col-xs-12 col-md-1" for="newPrecio">Precio</label>
             <label class="col-xs-12 col-md-2" for="newCategoria">Categoria</label>
             <label class="col-xs-12 col-md-1" for="newMedida">Medida</label>
        </div>
        <?php
            foreach ($productos as $producto){
            ?>
        <div class="form-group row">
            
            <div class="col-xs-12 col-md-2">
                    <input name='newEan' class='form-control' type='text' value="<?php echo $producto['ean']?>" required/>
            </div>
           
            <div class="col-xs-12 col-md-3">
                <input name='newNombre' class='form-control' type='text' value='<?php echo $producto['nombre']?>' required/>
            </div>
            <div class="col-xs-12 col-md-1">
                <input name='newCantidad' class='form-control' type='text' value='<?php echo $producto['cantidad']?>' required/>
            </div>
            <div class="col-xs-12 col-md-2">
                <input name='newCaducidad' class='form-control' type='date' value='<?php echo $producto['caducidad']?>' required/>
            </div>
            <div class="col-xs-12 col-md-1">
                <input name='newPrecio' class='form-control' type='text' value='<?php echo $producto['precio']?>' required/>
            </div>
            <div class="col-xs-12 col-md-2">
                    <select name="newCategoria" class="form-control" required>
                        <option></option>
                        <?php $categorias = Categoria::muestraCategorias();
                            foreach ($categorias as $categoria){
                                if($categoria['idCategoria'] == $producto['idCategoria']){
                                    echo "<option value='".$categoria['idCategoria']."' selected>".$categoria['nombre']."</option>";
                                } else {
                                   echo "<option value='".$categoria['idCategoria']."'>".$categoria['nombre']."</option>"; 
                                }
                                
                            }
                        ?>
                    </select>
            </div>
            <div class="col-xs-12 col-md-1">                
                    <select name="newMedida" class="form-control" required>
                        <option></option>
                        <?php $medidas = Medida::muestraMedidas();
                            foreach ($medidas as $medida){
                                if($medida['idMedida'] == $producto['idMedida']){
                                    echo "<option value='".$medida['idMedida']."' selected>".$medida['nombre']."</option>";
                                } else {
                                    echo "<option value='".$medida['idMedida']."'>".$medida['nombre']."</option>";
                                }
                                
                            }
                        ?>
                    </select>
            </div>
        </div>
            <?php
            }
            ?>
    </form>
    <button class="btn-link" id="nuevoProducto">añadir nuevo producto</button>
</div>