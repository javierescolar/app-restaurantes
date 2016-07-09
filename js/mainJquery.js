/*global $*/

window.onload = function(){
    
    $('li button').click(function(){
        $('.active').removeClass('active');
        $(this).addClass('active');
    });
}

    
    
