function postEscandayo() {
    var productos = [],
        cantidades = [],
        ganancia = 3;
//obtenemos los check marcados    
    $('input:checkbox').each(function (i, e) {
        if ($(this).prop("checked")) {
            productos.push(e.value);
        }
    });

//obtenemos las cantidades

    $('.CantidadEsenciales').each(function (i, e) {
        if (e.value != '') {
            cantidades.push(e.value);
        }
    });
    $('.CantidadSimples').each(function (i, e) {
        if (e.value != '') {
            cantidades.push(e.value);
        }
    });
    
    $.post('clases/Formulas.php',{postproductos:productos,postcantidades:cantidades,postganancias:ganancia},function(data){
        $('#precioEscandayoRecomendado').val(data);
        
    });
}



