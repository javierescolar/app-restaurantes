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


window.onload = function () {
    
    
    setTimeout("location.reload()",60000); 
    
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
