<?php $slas = SLA::muestraSla($_SESSION['user']['idRestaurante']); ?>
<div class="formularios row col-xs-12 col-md-10 col-md-offset-1">

    <div class="text-center cabeceraForm">SLA´s</div>
    <form action='index.php' method='POST' id="formProductos" class="listado">
        <div class="form-group row cabeceraProductos">
            <label class="col-xs-12 col-md-4 text-center" for="newEan">Nombre</label>
            <label class="col-xs-12 col-md-4 text-center" for="newNombre">Valor (minutos)</label>
            <label class="col-xs-12 col-md-4 text-center" for="newCantidad">Color</label>
        </div>
        <?php
        foreach ($slas as $sla) {
            ?>
            <div class="form-group row">

                <div class="col-xs-12 col-md-4">
                    <input name='newNombreSla' class='form-control' type='text' value="<?php echo $sla->getNombre(); ?>" required/>
                </div>

                <div class="col-xs-12 col-md-4">
                    
                        <input name='newValor' class='form-control' type='number' value='<?php echo $sla->getValor(); ?>' required/>
                     
                </div>

                <div class="col-xs-12 col-md-4">
                    <input name='newColor' class='form-control' type='text' value='<?php echo $sla->getColor(); ?>' required/>
                </div>
            </div>
            <?php
        }
        ?>

    </form>
    <button id="activarFormSla" class="btn-link">Nuevo Sla</button> 
</div>