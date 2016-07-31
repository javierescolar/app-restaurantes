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
	if (eanCode.length == 8 ) {
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
    var pattern = /^(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([a-z]|[ñáéíóú]){2,10})? ?(([a-z]|[ñáéíóú]){2,10})? ?(([a-z]|[ñáéíóú]){2,10})$/
    return pattern.test(nombre);
}

function validateCantidad(cantidad) {
    var pattern = /^[0-9]{1,5}$/
    return pattern.test(cantidad);
}

function validatePrecio(cantidad) {
    var pattern = /^\d{1,5}.\d{1,2}$/
    return pattern.test(cantidad);
}

function origenFormProductos(origen){
    $('origenFormularioProducto').value = origen;
}

window.onload = function () {
    
    if($('home')){
        setTimeout("location.reload()",60000); 
    }
    var nuevoProducto = 0;
    if ($('formLogin')) {
        $('formLogin').addEventListener("submit", function (event) {
            (validateEmail($('email').value) && validatePassword($('password').value)) ? true : event.preventDefault();
        });
    }
    if ($('formEditProfile')) {
        $('formEditProfile').addEventListener("submit", function (event) {
            (validateEmail($('newEmail').value) && validateDni($('newDni').value)
                    && validateName($('newNombre').value) && validateLastNames($('newApellidos').value)
                    && validatePhone($('newTelefono').value)) ? true : event.preventDefault();
        });
    }
    if ($('formNuevoProducto')) {
        $('formNuevoProducto').addEventListener("submit", function (event) {
            (validateEan($('newEan').value) && validateNombreProducto($('newNombreProducto').value)
                    && validateCantidad($('newCantidad').value) 
                    && validatePrecio($('newPrecio').value)) ? true : event.preventDefault();
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
