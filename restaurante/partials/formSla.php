<div id="formFlotante">
    <div id="formFlotanteCaja">
       
        <div class="formularios row col-xs-10 col-md-10 col-md-offset-1 col-xs-offset-1">

        <div class="text-center cabeceraForm">Nuevo SLA</div>
         <button class="col-md-offset-11 col-xs-offset-10 drop btn-link" id="desactivarFormSla"><span class="drop glyphicon glyphicon-remove"></span></button>
        <form action='index.php' method='POST' id="formNuevoSla">
            <button id="guardarSla" type="submit" name="guardarSla" class="btn-link" value="Guardar SLA"><span class="save glyphicon glyphicon-floppy-saved"></span></button>
            
            <div class="form-group row col-md-12">
                <div class="col-xs-12 col-md-4">
                    <label for="newNombreSla">Nombre</label>
                        <input name='newNombreSla' id="newNombreSla" class='form-control' type='text' value='' required/>
                </div>

                <div class="col-xs-12 col-md-4">
                    <label for="newValorSla">Valor</label>
                    <input name='newValorSla' id="newValorSla" class='form-control' type='number' value='' required/>

                </div>
                
                <div class="col-xs-12 col-md-4">
                    <label for="newColorSla">Color</label>
                     <select name='newColorSla' id="newColorSla" class='form-control' required>
                        <?php
                          foreach ($paletaColores as $color){
                              echo "<option style='background:".$color['valorHex']."' value='".$color['valorHex']."'>".$color['nombre']."</option>";

                          }
                        ?>
                    </select>
                

                </div>
                
            </div>
            <br>
        </form>
        </div>
         
    </div>
</div>

<script type="text/javascript" src="js/main.js"></script>
