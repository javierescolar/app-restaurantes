/*global $*/
function $(id){
    return document.getElementById(id);
}

window.onload = function(){
    
    $('li').click(function(){
        $('.li.active').removeClass('active');
        $(this).addClass('active');
    });
}

    
    
