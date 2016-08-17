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

function validateEan(eanCode) {
    // Check if only digits
    var ValidChars = "0123456789";
    for (i = 0; i < eanCode.length; i++) {
        digit = eanCode.charAt(i);
        if (ValidChars.indexOf(digit) == -1) {
            return false;
        }
    }

    // Add five 0 if the code has only 8 digits
    if (eanCode.length == 8) {
        eanCode = "00000" + eanCode;
    }
    // Check for 13 digits otherwise
    else if (eanCode.length != 13) {
        return false;
    }

    // Get the check number
    originalCheck = eanCode.substring(eanCode.length - 1);
    eanCode = eanCode.substring(0, eanCode.length - 1);

    // Add even numbers together
    even = Number(eanCode.charAt(1)) +
            Number(eanCode.charAt(3)) +
            Number(eanCode.charAt(5)) +
            Number(eanCode.charAt(7)) +
            Number(eanCode.charAt(9)) +
            Number(eanCode.charAt(11));
    // Multiply this result by 3
    even *= 3;

    // Add odd numbers together
    odd = Number(eanCode.charAt(0)) +
            Number(eanCode.charAt(2)) +
            Number(eanCode.charAt(4)) +
            Number(eanCode.charAt(6)) +
            Number(eanCode.charAt(8)) +
            Number(eanCode.charAt(10));

    // Add two totals together
    total = even + odd;

    // Calculate the checksum
    // Divide total by 10 and store the remainder
    checksum = total % 10;
    // If result is not 0 then take away 10
    if (checksum != 0) {
        checksum = 10 - checksum;
    }

    // Return the result
    if (checksum != originalCheck) {
        return false;
    }

    return true;
}

function validateNombreProducto(nombre) {
    var pattern = /^(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([a-z]|[ñáéíóú]){2,10})? ?(([a-z]|[ñáéíóú]){2,10})? ?(([a-z]|[ñáéíóú]){2,10})$/;
    return pattern.test(nombre);
}

function validateCantidad(cantidad) {
    var pattern = /^[0-9]{1,5}$/;
    return pattern.test(cantidad);
}

function validatePrecio(cantidad) {
    var pattern = /^\d{1,5}.\d{1,2}$/;
    return pattern.test(cantidad);
}

function validateMerma(merma) {
    var pattern = /^(?=.*[1-9])\d{0,2}(?:\.\d{0,2})?$/;
    return pattern.test(merma);
}
function validateValorSLA(valor) {
    var pattern = /^\d{1,4}$/;
    return pattern.test(valor);
}
function validateColorSLA(color) {
    var pattern = /(0x|0X)?[a-fA-F0-9]+$/;
    return pattern.test(color);
}

function origenFormProductos(origen) {
    $('origenFormularioProducto').value = origen;
}

function editarIngrediente(boton) {
    $('productoEditado').value = boton;
}

function borrarIngrediente(boton) {
    $('productoBorrado').value = boton;
}

function borrarFactura(boton) {
    $('facturaBorrado').value = boton;
}

function borrarSla(boton) {
    $('slaBorrado').value = boton;
}

function preparado(check) {
    check.value = (check.checked === true) ? "terminado" : "noTerminado";
    document.getElementById('idPlatoEnElTicket').value = check.getAttribute('data-id');
    swal({title: "¿Estás seguro?", text: "Si confirma se restarán los ingredientes del inventario", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Sí", cancelButtonText: "No", closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
            if (isConfirm) {
                check.form.submit();
            } else {
                swal("Cancelado", "No marco como preparado", "error");
                check.checked = false;
            }
        });
}
if ($('home')) {
    setTimeout("location.reload()", 30000);
}
var nuevoProducto = 0;
if ($('formLogin')) {
    $('formLogin').addEventListener("submit", function (event) {
        if (validateEmail($('email').value) && validatePassword($('password').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
        }
    });
}


if ($('formEditProfile')) {
    $('formEditProfile').addEventListener("submit", function (event) {
        if (validateEmail($('newEmail').value) && validateDni($('newDni').value)
                && validateName($('newNombre').value) && validateLastNames($('newApellidos').value)
                && validatePhone($('newTelefono').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if(!validateEmail($('newEmail').value)){
                $('newEmail').style.border = 'solid #F7BE81 0.1em';
                $('newEmail').style.boxShadow = '0em 0em 0.5em #FE9A2E';  
            }
            if(!validateDni($('newDni').value)){
                $('newDni').style.border = 'solid #F7BE81 0.1em';
                $('newDni').style.boxShadow = '0em 0em 0.5em #FE9A2E';  
            }
            if(!validateName($('newNombre').value)){
                $('newNombre').style.border = 'solid #F7BE81 0.1em';
                $('newNombre').style.boxShadow = '0em 0em 0.5em #FE9A2E';  
            }
            if(!validateLastNames($('newApellidos').value)){
                $('newApellidos').style.border = 'solid #F7BE81 0.1em';
                $('newApellidos').style.boxShadow = '0em 0em 0.5em #FE9A2E';  
            }
            if(!validatePhone($('newTelefono').value)){
                $('newTelefono').style.border = 'solid #F7BE81 0.1em';
                $('newTelefono').style.boxShadow = '0em 0em 0.5em #FE9A2E';  
            }
        }

    });
}
if ($('formNuevoProducto')) {
    $('formNuevoProducto').addEventListener("submit", function (event) {
        if (validateEan($('newEan').value) && validateNombreProducto($('newNombreProducto').value)
                && validateCantidad($('newCantidad').value)
                && validatePrecio($('newPrecio').value)
                && validateMerma($('newMerma').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validateEan($('newEan').value)) {
                $('newEan').style.border = 'solid #F7BE81 0.1em';
                $('newEan').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
            if (!validateNombreProducto($('newNombreProducto').value)) {
                $('newNombreProducto').style.border = 'solid #F7BE81 0.1em';
                $('newNombreProducto').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
            if (!validateCantidad($('newCantidad').value)) {
                $('newCantidad').style.border = 'solid #F7BE81 0.1em';
                $('newCantidad').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
            if (!validatePrecio($('newPrecio').value)) {
                $('newPrecio').style.border = 'solid #F7BE81 0.1em';
                $('newPrecio').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
            if (!validateMerma($('newMerma').value)) {
                $('newMerma').style.border = 'solid #F7BE81 0.1em';
                $('newMerma').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
        }
    });
}
if ($('formNuevoSla')) {
    $('formNuevoSla').addEventListener("submit", function (event) {
        if (validateName($('newNombreSla').value) && validateColorSLA($('newColorSla').value)
                && validateValorSLA($('newValorSla').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validateName($('newNombreSla').value)) {
                $('newNombreSla').style.border = 'solid #F7BE81 0.1em';
                $('newNombreSla').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
            if (!validateColorSLA($('newColorSla').value)) {
                $('newColorSla').style.border = 'solid #F7BE81 0.1em';
               $('newColorSla').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
            if (!validateValorSLA($('newValorSla').value)) {
                $('newValorSla').style.border = 'solid #F7BE81 0.1em';
                $('newValorSla').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }
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
                boton.value = "cerrarTicket";
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
                boton.value = "anularTicket";
                boton.parentElement.parentElement.parentElement.submit();
            } else {
                swal("Cancelado", "No se anulo el ticket", "error");
            }
        });
    });
}

if ($('mandarComanda')) {
    $('mandarComanda').addEventListener("click", function (event) {
        event.preventDefault();
        var boton = $('mandarComanda');
        swal({title: "¿Estás seguro?", text: "¿quieres mandar la comanda?", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Sí", cancelButtonText: "No", closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
            if (isConfirm) {
                $('accionTicket').value = "mandarComanda";
                boton.value = "mandarComanda";
                boton.parentElement.parentElement.parentElement.submit();
            } else {
                swal("Cancelado", "No se cerro la comanda", "error");
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

if ($('activarFormSla')) {
    $('activarFormSla').addEventListener("click", function () {
        $('formFlotante').style.display = 'block';
    });
}
if ($('desactivarFormSla')) {
    $('desactivarFormSla').addEventListener("click", function () {
        $('formFlotante').style.display = 'none';
    });
}

if ($('activarFromFacturas')) {
    $('activarFromFacturas').addEventListener("click", function () {
        $('formFlotante').style.display = 'block';
    });
}
if ($('desactivarFromFacturas')) {
    $('desactivarFromFacturas').addEventListener("click", function () {
        $('formFlotante').style.display = 'none';
    });
}

if ($('formAgua')) {
    $('formAgua').addEventListener("submit", function (event) {
        if (validatePrecio($('newPago').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validatePrecio($('newPago').value)) {
                $('newPago').style.border = 'solid #F7BE81 0.1em';
                $('newPago').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }

        }
    });
}

if ($('formGas')) {
    $('formGas').addEventListener("submit", function (event) {
        if (validatePrecio($('newPago').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validatePrecio($('newPago').value)) {
                $('newPago').style.border = 'solid #F7BE81 0.1em';
                $('newPago').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }

        }
    });
}

if ($('formLuz')) {
    $('formLuz').addEventListener("submit", function (event) {
        if (validatePrecio($('newPago').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validatePrecio($('newPago').value)) {
                $('newPago').style.border = 'solid #F7BE81 0.1em';
                $('newPago').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }

        }
    });
}
if ($('formPubicidad')) {
    $('formPublicidad').addEventListener("submit", function (event) {
        if (validatePrecio($('newPago').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validatePrecio($('newPago').value)) {
                $('newPago').style.border = 'solid #F7BE81 0.1em';
                $('newPago').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }

        }
    });
}

if ($('formServicio')) {
    $('formServicio').addEventListener("submit", function (event) {
        if (validatePrecio($('newPago').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validatePrecio($('newPago').value)) {
                $('newPago').style.border = 'solid #F7BE81 0.1em';
                $('newPago').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }

        }
    });
}

if ($('formNomina')) {
    $('formNomina').addEventListener("submit", function (event) {
        if (validatePrecio($('newPago').value)) {
            true;
        } else {
            event.preventDefault();
            swal("Atención", "Los datos introducidos no son válidos", "warning");
            if (!validatePrecio($('newPago').value)) {
                $('newPago').style.border = 'solid #F7BE81 0.2em';
                $('newPago').style.boxShadow = '0em 0em 0.5em #FE9A2E';
            }

        }
    });
}