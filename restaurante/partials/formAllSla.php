<?php $slas = SLA::muestraSla($_SESSION['user']['idRestaurante']); ?>
<div class="formularios row col-xs-12 col-md-10 col-md-offset-1">

    <div class="text-center cabeceraForm">SLA´s</div>
    <form action='index.php' method='POST' id="formProductos" class="listado">
        <button id="guardarSlas" type="submit" name="guardarSlas" class="btn-link" value="Guardar Sla"><span class="save glyphicon glyphicon-floppy-saved"></span></button>
        <div class="form-group row cabeceraProductos">
            <label class="col-xs-12 col-md-1 text-center" for="newborrar"></label>
            <label class="col-xs-12 col-md-4 text-center" for="newEan">Nombre</label>
            <label class="col-xs-12 col-md-3 text-center" for="newNombre">Valor (minutos)</label>
            <label class="col-xs-12 col-md-4 text-center" for="newCantidad">Color</label>
        </div>
        <?php
        $x=0;
        foreach ($slas as $sla) {
            ?>
            <div class="form-group row">
               <input name='<?php echo "newIdsSla[$x]"; ?>' type='hidden' value="<?php echo $sla->getId(); ?>"/>
                <div class="col-xs-12 col-md-1 text-center"> 
                    <button type="submit" onclick="borrarSla(this.getAttribute('data-slaborrado'));"  data-slaborrado="<?php echo $sla->getId() ?>" class="btn-link"><span class="drop glyphicon glyphicon-trash"></span></button>
                </div>
                <div class="col-xs-12 col-md-4">
                    <input name='<?php echo "newNombreSla[$x]"; ?>' class='form-control' type='text' value="<?php echo $sla->getNombre(); ?>" required/>
                </div>

                <div class="col-xs-12 col-md-3">
                     <input name='<?php echo "newValor[$x]"; ?>' class='form-control' type='number' value='<?php echo $sla->getValor(); ?>' required/>
                </div>

                <div class="col-xs-12 col-md-4">
                    <input name='<?php echo "newColor[$x]"; ?>' class='form-control' type='text' value='<?php echo $sla->getColor(); ?>' required/>
                </div>
            </div>
            <?php
            $x++;
        }
        ?>
         <input id="slaBorrado" name='slaBorrado' type='hidden' value="" />
    </form>
    <button id="activarFormSla" class="btn-link">Nuevo Sla</button> 
</div>