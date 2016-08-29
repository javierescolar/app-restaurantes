



<script type="text/javascript">
	var chart;
	$(document).ready(function() {

		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'graficaLineal', 	// Le doy el nombre a la gráfica
				defaultSeriesType: 'line'	// Pongo que tipo de gráfica es
			},
			title: {
				text: 'Datos de las Visitas'	// Titulo (Opcional)
			},
			subtitle: {
				text: 'Jarroba.com'		// Subtitulo (Opcional)
			},
			// Pongo los datos en el eje de las 'X'
			xAxis: {
				categories: ['Feb12','Mar12','Abr12','May12','Jun12','Jul12','Ago12','Sep12','Oct12','Nov12',
'Dic12','Ene13','Feb13','Mar13','Abr13','May13','Jun13'],
				// Pongo el título para el eje de las 'X'
				title: {
					text: 'Meses'
				}
			},
			yAxis: {
				// Pongo el título para el eje de las 'Y'
				title: {
					text: 'Nº Visitas'
				}
			},
			// Doy formato al la "cajita" que sale al pasar el ratón por encima de la gráfica
			tooltip: {
				enabled: true,
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+
						this.x +': '+ this.y +' '+this.series.name;
				}
			},
			// Doy opciones a la gráfica
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: true
				}
			},
			// Doy los datos de la gráfica para dibujarlas
			series: [{
		                name: 'Visitas',
		                data: [103,474,402,536,1041,270,0,160,2462,3797,3527,4505,8090,7493,7048,11408,10886]
		            },
		            {
		                name: 'Visitantes Únicos',
		                data: [21,278,203,370,810,213,0,134,1991,3122,2870,3655,6400,5818,5581,8529,8261]
		            },
		            {
		                name: 'Páginas Vistas',
		                data: [1064,1648,1040,1076,2012,397,0,325,3732,6067,5226,6482,11503,11937,9751,16061,15643]
		            }],
		});	
	});	
        
        var chart;
	$(document).ready(function() {

		 chart = new Highcharts.Chart({
        chart: {
            renderTo: 'graficaLineal2',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Chart rotation demo'
        },
        subtitle: {
            text: 'Test options by dragging the sliders below'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });

    

    // Activate the sliders
    	
	});
        
        
       
	$(document).ready(function() {

		
	var chart3; 
       
          chart3 = new Highcharts.Chart({
        chart: {
            renderTo: 'graficaLineal3', 
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Browser market shares at a specific website, 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox', 45.0],
                ['IE', 26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari', 8.5],
                ['Opera', 6.2],
                ['Others', 0.7]
            ]
        }]
    });
    
	});
</script>

<div class="row">
     <div class="col-md-12 col-xs-12">
         <div id="graficaLineal" style="width: 100%; height: 30em; margin: 0 auto"></div>
    </div>
   
</div>
<div class="row">
    <div class="col-md-6 col-xs-12">
        <div id="graficaLineal2" style="width: 100%; height: 25em; margin: 0 auto"></div>

    </div>
    <div class="col-md-6 col-xs-12">
         <div id="graficaLineal3" style="width: 100%; height: 25em; margin: 0 auto"></div>
    </div>
</div>

