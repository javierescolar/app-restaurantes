/*global $*/
function $(id){
    return document.getElementById(id);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePassword(pass){
    var pa = /^(?=.*\d)(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    return pa.test(pass);
}

window.onload = function(){
    if($('formLogin')){
        $('formLogin').addEventListener("submit",function(event){
            (validateEmail($('email').value) && validatePassword($('password').value)) ? true : event.preventDefault();
        });
    }
    if($('formEditProfile')){
        $('formEditProfile').addEventListener("submit",function(event){
            (validateEmail($('newEmail').value))?true : event.preventDefault();
        });
    }
   
}

    
    
