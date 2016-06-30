/*global $*/
var valid = '#00FF00',
    notValid = '#FF0000';

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validatePassword(pass){
    var pa = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";
    return pa.test(pass);
}

$(window).ready(function(){
    $('#email').keyup(function(){
        validateEmail($(this).val()) ? $('.check1').css('display','inline') : $('.check1').css('display','none');
    }).click(function(){
        validateEmail($(this).val()) ? $('.check1').css('display','inline') : $('.check1').css('display','none');
    });
    $('#password').keyup(function(){
        validatePassword($(this).val()) ? $('.check2').css('display','inline') : $('.check2').css('display','none');
    }).click(function(){
        validatePassword($(this).val()) ? $('.check2').css('display','inline') : $('.check2').css('display','none');
    });
    
});
   
    
    
