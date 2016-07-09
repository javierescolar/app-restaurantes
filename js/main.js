/*global $*/
function $(id){
    return document.getElementById(id);
}

function validateEmail(email) {
    var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return pattern.test(email);
}

function validatePassword(pass){
    var pattern = /^(?=.*\d)(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    return pattern.test(pass);
}
function validateName(nombre){
    var pattern = /^(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})$/;
    return pattern.test(nombre);
}

function validateLastNames(apellidos){
    var pattern =  /^(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})? ?(([A-Z]|(Á|É|Í|Ó|Ú))([a-z]|[ñáéíóú]){2,10})$/
    return pattern.test(apellidos);
}

function validatePhone(telefono){
    var pattern = /^\d{9}$/;
    return pattern.test(telefono);
}

function validateDni(dni){
    var pattern = /^[0-9]{8}[a-zA-z]{1}$/,
        numero,
        letr,
        letra,
        resultado;
    if(pattern.test(dni)){
        numero = dni.substr(0,dni.length-1);
        letr = dni.substr(dni.length-1,1);
        numero = numero % 23;
        letra='TRWAGMYFPDXBNJZSQVHLCKET';
        letra=letra.substring(numero,numero+1);
        resultado = (letra!=letr.toUpperCase())? false:true;
     }else{
        resultado = false;
    }
    return resultado;
}

function createButtonSave(){
    var btnSave = document.createElement('button'),
        span =  document.createElement('span'),
        icono = document.createAttribute('class');
        icono.value = "glyphicon glyphicon-ok";
    span.setAttributeNode(icono);
    return btnSave.appendChild(span);
}

function createButtonDrop(){
    var btnSave = document.createElement('button'),
        span =  document.createElement('span'),
        icono = document.createAttribute('class');
        icono.value = "glyphicon glyphicon-remove";
    span.setAttributeNode(icono);
    return btnSave.appendChild(span);
}

function addRowTabla(tabla){
    
    var fila = tabla.insertRow();
    celdaAccion = fila.insertCell();
    celdaAccion.appendChild(createButtonSave());
    celdaAccion.appendChild(createButtonDrop());
    
}

function objetoToArray(objeto) {
    'use strict';
    var array = [],
        i = 0;
    for (i in objeto) {
        if (objeto.hasOwnProperty(i)) {
            array.push(objeto[i]);
        }
    }
    return array;
}




window.onload = function(){
    if($('formLogin')){
        $('formLogin').addEventListener("submit",function(event){
            (validateEmail($('email').value) && validatePassword($('password').value)) ? true : event.preventDefault();
        });
    }
    if($('formEditProfile')){
        $('formEditProfile').addEventListener("submit",function(event){
            (validateEmail($('newEmail').value) && validateDni($('newDni').value)
            && validateName($('newNombre').value && validateLastNames($('newApellidos').value))
            && validatePhone($('newTelefono').value))?true : event.preventDefault();
        });
    }
    if($('nuevoProducto')){
        $('nuevoProducto').addEventListener("click", function(){
            addRowTabla($("tablaProductos"));
        });
    }
    
   
}

    
    
