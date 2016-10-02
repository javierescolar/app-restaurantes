function postEscandayo() {
    var productos = [],
        cantidades = [],
        ganancia = 3;
//obtenemos los check marcados    
    jQuery('input:checkbox').each(function (i,e) {
        if (jQuery(this).prop("checked")) {
            productos.push(e.value);
        }
    });

//obtenemos las cantidades

    jQuery('.CantidadEsenciales').each(function (i, e) {
        if (e.value != '') {
            cantidades.push(e.value);
        }
    });
    jQuery('.CantidadSimples').each(function (i, e) {
        if (e.value != '') {
            cantidades.push(e.value);
        }
    });
    
    postAjax(productos,cantidades,ganancia);
}

function postAjax(productos,cantidades,ganancia){
    jQuery.post('clases/Formulas.php',{postproductos:productos,postcantidades:cantidades,postganancias:ganancia},function(data){
        jQuery('#precioEscandayoRecomendado').val(data);
        
    });
}



