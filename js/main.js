/*global $*/
function $(id){
    return document.getElementById(id);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePassword(pass){
    var pa = /^[0-9]{2,8}/;
    return pa.test(pass);
}

window.onload = function(){
    $('formLogin').addEventListener("submit",function(event){
      (validateEmail($('email').value) && validatePassword($('password').value)) ? true : event.preventDefault();
    });
}

    
    
