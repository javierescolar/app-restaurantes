/*global $*/

window.onload = function(){
    $('#editarPerfil').click(function(){
            swal("Guardado!", "Se han sobreescrito los datos", "success");
    });
    
    
    $('li').click(function(){
        $('.li.active').removeClass('active');
        $(this).addClass('active');
    });
}

    
    
