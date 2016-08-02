<div id="formFlotante">
    <div id="formFlotanteCaja">
        <button class="col-md-offset-11 col-xs-offset-10 drop btn-link" id="desactivarFormSla"><span class="glyphicon glyphicon-remove"></span></button>
        <div class="formularios row col-xs-10 col-md-10 col-md-offset-1 col-xs-offset-1">

        <div class="text-center cabeceraForm">Nuevo SLA</div>
        <form action='index.php' method='POST' id="formNuevoSla">
            <div class="form-group row col-md-12">
                <div class="col-xs-12 col-md-3">
                    <label for="newNombreSla">Nombre</label>
                        <input name='newNombreSla' id="newNombreSla" class='form-control' type='text' value='' required/>
                </div>

                <div class="col-xs-12 col-md-3">
                    <label for="newValorSla">Valor</label>
                    <input name='newValorSla' id="newValorSla" class='form-control' type='number' value='' required/>

                </div>
                
                <div class="col-xs-12 col-md-3">
                    <label for="newColorSla">Color</label>
                    <input name='newColorSla' id="newColorSla" class='form-control' type='text' required/>

                </div>
                <div class="col-xs-12 col-md-3">
                     <label for="guardarSla"> </label>
                     <input type="submit" class="col-md-offset-6 btn btn-danger" name="guardarSla" value="Guardar SLA">
                </div>
            </div>
            <br>
        </form>
        </div>
         
    </div>
</div>

<script type="text/javascript" src="js/main.js"></script>
