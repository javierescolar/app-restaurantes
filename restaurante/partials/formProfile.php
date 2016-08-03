<?php $perfil = Perfil::cargarPerfil($_SESSION['user']['idPerfil']); ?>

<div class="formularios row col-xs-12 col-xs-12 col-md-10 col-md-offset-1">
    <div class="text-center cabeceraForm">Datos Usuario</div>
    <form action="index.php" method="POST" class="form col-xs-12 col-md-12 " id="formEditProfile" role="form">
        <button id="editarPerfil" type="submit" name="editarPerfil" class="btn-link" value="Guardar"><span class="save glyphicon glyphicon-floppy-saved"></span></button>
         
        <div class="form-group row">
            <label for="newDni" class="col-xs-1 col-md-1 form-control-label">Dni:</label>
            <div class="col-xs-12 col-md-3">
                <input type="text" id="newDni" name="newDni" class="form-control" required value="<?php echo $_SESSION['user']['dni']; ?>">
            </div>
            <label for="newNombre" class="col-xs-1 col-md-1 form-control-label">Nombre:</label>
            <div class="col-xs-12 col-md-7">
                <input type="text" id="newNombre" name="newNombre" class="form-control" required value="<?php echo $_SESSION['user']['nombre']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="newApellidos" class="col-xs-1 col-md-1 form-control-label">Apellidos:</label>
            <div class="col-xs-12 col-md-7">
                <input type="text" id="newApellidos" name="newApellidos" class="form-control" required value="<?php echo $_SESSION['user']['apellidos']; ?>">
            </div>
            <label for="newTelefono" class="col-xs-1 col-md-1 form-control-label">Teléfono:</label>
            <div class="col-xs-12 col-md-3">
                <input type="text" id="newTelefono" name="newTelefono" class="form-control" required value="<?php echo $_SESSION['user']['telefono']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="newEmail" class="col-xs-1 col-md-1 form-control-label">Email:</label>
            <div class="col-xs-12 col-md-7">
                <input type="email" id="newEmail" name="newEmail" class="form-control" required value="<?php echo $_SESSION['user']['email']; ?>">
            </div>
            <label for="newPerfil" class="col-xs-1 col-md-1 form-control-label">Perfil:</label>
            <div class="col-xs-12 col-md-3">
                <input type="text" name="newPerfil" class="form-control" required disabled value="<?php echo $perfil['nombre']; ?>">
            </div>
        </div>

    </form>
</div>