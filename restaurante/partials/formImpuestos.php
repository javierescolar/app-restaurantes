<div id="formFlotante">
    <div id="formFlotanteCaja">
       
        <div class="formularios row col-xs-10 col-md-10 col-md-offset-1 col-xs-offset-1">

        <div class="text-center cabeceraForm">Nuevo Factura</div>
         <button class="col-md-offset-11 col-xs-offset-10 drop btn-link" id="desactivarFromFacturas"><span class="drop glyphicon glyphicon-remove"></span></button>
        <form action='index.php' method='POST' id="formNomina">
            <button id="guardarImpuesto" type="submit" name="guardarImpuesto" class="btn-link" value="Guardar Impùesto"><span class="save glyphicon glyphicon-floppy-saved"></span></button>
            
            <div class="form-group row col-md-12">
                <div class="col-xs-12 col-md-4">
                    <label for="newNumRef">Nº Referencia</label>
                        <input name='newNumRef' id="newNumRef" class='form-control' type='text' value='' required/>
                </div>

                <div class="col-xs-12 col-md-4">
                    <label for="newPago">Pago</label>
                    <input name='newPago' id="newPago" class='form-control' type='text' value='' required/>

                </div>
                
                <div class="col-xs-12 col-md-4">
                    <label for="newFechaPago">Fecha Pago</label>
                    <input name='newFechaPago' id="newFechaPago" class='form-control' type='date'  min="<?php echo date("Y-m-d"); ?>" required/>

                </div>
                
            </div>
            <br>
        </form>
        </div>
         
    </div>
</div>

<script type="text/javascript" src="js/main.js"></script>
