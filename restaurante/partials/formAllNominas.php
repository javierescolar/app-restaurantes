<?php $facturas = Factura::muestraFacturas($_SESSION['tipoFactura'],$_SESSION['user']['idRestaurante']); ?>
<div class="formularios row col-xs-12 col-md-10 col-md-offset-1">

    <div class="text-center cabeceraForm">Nóminas</div>
    <form action='index.php' method='POST' id="formProductos" class="listado">
        <button id="editarNominas" type="submit" name="editarFacturas" class="btn-link" value='guardar'><span class="save glyphicon glyphicon-floppy-saved"></span></button>
        <div class="form-group row cabeceraProductos">
            <label class="col-xs-12 col-md-1 text-center" for="productoBorrado"></label>
            <label class="col-xs-12 col-md-4 text-center" for="newEan">Nº Ref.</label>
            <label class="col-xs-12 col-md-3 text-center" for="newNombre">Pago</label>
            <label class="col-xs-12 col-md-4 text-center" for="newCantidad">Fecha pago</label>
            
        </div>
        <?php
        $x=0;
        foreach ($facturas as $factura) {
            ?>
            <div class="form-group row">
                <div class="col-xs-12 col-md-1 text-center"> 
                   <button type="submit" onclick="borrarFactura(this.getAttribute('data-facturaborrado'));"  data-facturaborrado="<?php echo $factura['idFactura'] ?>" class="btn-link"><span class="drop glyphicon glyphicon-trash drops"></span></button>
                </div>
                <input name='<?php echo "newIds[$x]"; ?>' type='hidden' value="<?php echo $factura['idFactura'] ?>"/>
                <div class="col-xs-12 col-md-4">
                    <input name='<?php echo "newNumRef[$x]"; ?>' class='form-control' type='text' value="<?php echo $factura['numReferencia'] ?>" required/>
                </div>

                <div class="col-xs-12 col-md-3">
                    <input name='<?php echo "newPago[$x]"; ?>' class='form-control' type='text' value='<?php echo $factura['pago'] ?>' required/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <input name='<?php echo "newFechaPago[$x]"; ?>' class='form-control' type='text' value='<?php echo $factura['fechaPago'] ?>' required/>
                </div>
            </div>
            <?php
            $x++;
        }
        ?>
        
        
        <input id="facturaBorrado" name='facturaBorrado' type='hidden' value="" />
    </form>
    <button id="activarFromFacturas" class="btn-link">Nuevo pago</button> 
</div>