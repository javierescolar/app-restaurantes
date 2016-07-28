/*global $*/
function $(id) {
    return document.getElementById(id);
}

function validateEmail(email) {
    var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return pattern.test(email);
}

function validatePassword(pass) {
    var pattern = /^(?=.*\d)(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    return pattern.test(pass);
}
function validateName(nombre) {
    var pattern = /^(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})$/;
    return pattern.test(nombre);
}

function validateLastNames(apellidos) {
    var pattern = /^(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})$/
    return pattern.test(apellidos);
}

function validatePhone(telefono) {
    var pattern = /^\d{9}$/;
    return pattern.test(telefono);
}

function validateDni(dni) {
    var pattern = /^[0-9]{8}[a-zA-z]{1}$/,
            numero,
            letr,
            letra,
            resultado;
    if (pattern.test(dni)) {
        numero = dni.substr(0, dni.length - 1);
        letr = dni.substr(dni.length - 1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero + 1);
        resultado = (letra != letr.toUpperCase()) ? false : true;
    } else {
        resultado = false;
    }
    return resultado;
}

function createButtonSave() {
    var btnSave = document.createElement('button'),
            span = document.createElement('span');
    span.setAttribute('class', "glyphicon glyphicon-ok");
    btnSave.setAttribute("class", "btn-link save");
    btnSave.setAttribute("type", "submit");
    btnSave.setAttribute("name", "saveProduct");
    btnSave.appendChild(span);
    return btnSave;
}

function createButtonDrop() {
    var btnDrop = document.createElement('button'),
            span = document.createElement('span');
    span.setAttribute('class', "glyphicon glyphicon-remove");
    btnDrop.setAttribute("class", "btn-link drop");
    btnDrop.setAttribute("type", "submit");
    btnDrop.setAttribute("name", "dropProduct");
    btnDrop.appendChild(span);
    return btnDrop;
}

function createInput(name) {
    var input = document.createElement('input');
    input.setAttribute("type", "text");
    input.setAttribute("class", "form-control");
    input.setAttribute("name", name);
    return input;
}
function addRowForm(form) {
    var fila = document.createElement('div'),
            celdaEan = document.createElement('div'),
            celdaNombre = document.createElement('div'),
            celdaCantidad = document.createElement('div'),
            celdaCaducidad = document.createElement('div'),
            celdaAccion = document.createElement('div');
    fila.setAttribute('class', 'form-group row');
    celdaEan.setAttribute('class', 'col-xs-12 col-md-3');
    celdaNombre.setAttribute('class', 'col-xs-12 col-md-3');
    celdaCantidad.setAttribute('class', 'col-xs-12 col-md-2');
    celdaCaducidad.setAttribute('class', 'col-xs-12 col-md-3');
    celdaAccion.setAttribute('class', 'col-xs-12 col-md-1');
    celdaEan.appendChild(createInput('EAN'));
    celdaNombre.appendChild(createInput('Nombre'));
    celdaCantidad.appendChild(createInput('Cantidad'));
    celdaCaducidad.appendChild(createInput('Caducidad'));
    celdaAccion.appendChild(createButtonSave());
    celdaAccion.appendChild(createButtonDrop());
    fila.appendChild(celdaEan);
    fila.appendChild(celdaNombre);
    fila.appendChild(celdaCantidad);
    fila.appendChild(celdaCaducidad);
    fila.appendChild(celdaAccion);
    form.appendChild(fila);
}


window.onload = function () {
    var nuevoProducto = 0;
    if ($('formLogin')) {
        $('formLogin').addEventListener("submit", function (event) {
            (validateEmail($('email').value) && validatePassword($('password').value)) ? true : event.preventDefault();
        });
    }
    if ($('formEditProfile')) {
        $('formEditProfile').addEventListener("submit", function (event) {
            (validateEmail($('newEmail').value) && validateDni($('newDni').value)
                    && validateName($('newNombre').value && validateLastNames($('newApellidos').value))
                    && validatePhone($('newTelefono').value)) ? true : event.preventDefault();
        });
    }
    if ($('nuevoProducto')) {
        $('nuevoProducto').addEventListener("click", function () {
            if (nuevoProducto === 0) {
                nuevoProducto++;
                addRowForm($("formProductos"));
            } else {
                swal('Atención', 'Debe guardar un producto antes de añadir otro', 'warning');
            }

        });
    }
    if ($('cerrarTicket')) {
        $('cerrarTicket').addEventListener("click", function (event) {
            event.preventDefault();
            var boton = $('cerrarTicket');
            swal({title: "¿Estás seguro?", text: "¿quieres cerrar el ticket?", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Sí", cancelButtonText: "No", closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
                if (isConfirm) {
                    $('accionTicket').value = "cerrarTicket";
                    boton.value="aaa";
                   boton.parentElement.parentElement.parentElement.submit();
                } else {
                    swal("Cancelado", "No se cerro el ticket", "error");
                }
            });
        });
    }
    if ($('anularTicket')) {
        $('anularTicket').addEventListener("click", function (event) {
            event.preventDefault();
            var boton = $('anularTicket');
            swal({title: "¿Estás seguro?", text: "¿quieres anular el ticket?", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Sí", cancelButtonText: "No", closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
                if (isConfirm) {
                    $('accionTicket').value = "anularTicket";
                    boton.value="anularTicket";
                   boton.parentElement.parentElement.parentElement.submit();
                } else {
                    swal("Cancelado", "No se anulo el ticket", "error");
                }
            });
        });
    }
    if ($('activarFromProductos')) {
        $('activarFromProductos').addEventListener("click", function () {
            $('formFlotante').style.display = 'block'; 
        });
    }
    if ($('desactivarFromProductos')) {
        $('desactivarFromProductos').addEventListener("click", function () {
            $('formFlotante').style.display = 'none';
        });
    }
     
    
}
