/*global $*/

jQuery(document).ready(function () {
    var num;
    jQuery('.botonCerrarComanda').click(function (event) {
        num = jQuery(this).data('numform');
        event.preventDefault();
        swal({title: "¿Cerrar comanda?", text: "Se informará de que todos los platos están listo", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Sí", cancelButtonText: "No", closeOnConfirm: false, closeOnCancel: false}, function (isConfirm) {
            if (isConfirm) {
                jQuery('.botonCerrarComanda')[num].value = "cerrarComanda"
                var forms = document.getElementsByClassName('formTicket');
                forms[num].submit();
            } else {
                swal("Cancelado", "No se cerro la comanda", "error");
            }
        });
    });


});



