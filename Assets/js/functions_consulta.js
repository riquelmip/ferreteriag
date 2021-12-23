
var tableRoles;
var divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function(){
 
	tableRoles = $('#tableConsul').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Consultas/getRoles",
            "dataSrc":""
        },
        "columns":[
          
            {"data":"descripcion"},
            {"data":"canti"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

  
   
    //pruebin();
    fntGraficoBarra();
    //fntGraficoLineal();
  });

$('#tableConsul').DataTable();


function pruebin() {
     google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
     var data = google.visualization.arrayToDataTable([
          ['Task', 'AAAA'],
          ['Chapa',     11],
          ['Tubo PBC',      8],
          ['Alambre',  6],
          ['Pintura Azul', 2],
          ['Cerradura',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('graficoo'));
        chart.draw(data, options);
      }
}



 $('#create_pdf').click(function(){
  // console.log("entro");
  // $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });

 $('#noTabla').click(function(){
  var llave=document.getElementById('keyTable').value;
  if(llave==0){
 document.getElementById('laTabla').style.display = 'none';
document.getElementById('keyTable').value=1;
  }else{
 document.getElementById('laTabla').style.display = 'block';
document.getElementById('keyTable').value=0;
  }

   });


 function fntGraficoPastel(){

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
          ['Task', 'AAAA'],
          ['Chapa',     11],
          ['Tubo PBC',      8],
          ['Alambre',  6],
          ['Pintura Azul', 2],
          ['Cerradura',    7]
        ]);
  var options = {
    title: 'Título',
    is3D: true,
  };

        var chart = new google.visualization.PieChart(document.getElementById('graficoo'));
  google.visualization.events.addListener(chart, 'ready', function(){
    // chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
       document.getElementById('algo').value=chart.getImageURI();
         });
        chart.draw(data, options);
    }
}

function fntGraficoLineal(){

    google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();
         data.addColumn('date', 'Mes');
      data.addColumn('number', "Chapa");
      data.addColumn('number', "Cerradura");

      data.addRows([
        [new Date(2014, 0),  -.5,  5.7],
        [new Date(2014, 1),   .4,  8.7],
        [new Date(2014, 2),   .5,   12],
        [new Date(2014, 3),  2.9, 15.3],
        [new Date(2014, 4),  6.3, 18.6],
        [new Date(2014, 5),    9, 20.9],
        [new Date(2014, 6), 10.6, 19.8],
        [new Date(2014, 7), 10.3, 16.6],
        [new Date(2014, 8),  7.4, 13.3],
        [new Date(2015, 9),  4.4,  9.9],
        [new Date(2015, 10), 1.1,  6.6],
        [new Date(2015, 11), -.2,  4.5]
      ]);

     var options = {
        chart: {
          title: 'Productos más vendidos',
          subtitle: 'Cantidades'
        },
        
      };

        var chart = new google.charts.Line(document.getElementById('graficoo'));

        chart.draw(data, google.charts.Line.convertOptions(options));

    //         var chart_area = document.getElementById('graficoo');
    // var chart =new google.charts.Line(chart_area);

    // google.visualization.events.addListener(chart, 'ready', function(){
    // // chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
    //    document.getElementById('algo').value=chart.getImageURI();
    // });
    // chart.draw(data, google.charts.Line.convertOptions(options));
    }
}

function fntGraficoBarra(){
     google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var data = google.visualization.arrayToDataTable([
          ['Task', 'AAAA'],
          ['Chapa',11],
          ['Tubo PBC', 8],
          ['Alambre',6],
          ['Pintura Azul',2],
          ['Cerradura',7],
          ['Pintura Azul',2],
          ['Cerradura',7],
          ['Pintura Azul',2],
          ['Cerradura',7],
          ['Cerradura',7]
        ]);
    
  var options = {
        title: "Productos random",
        colors: ['#1b9e77', '#d95f02', '#7570b3'],
         legend: { position: "none" },
      };

      var chart_area = document.getElementById('graficoo');
    var chart = new google.visualization.ColumnChart(chart_area);

    google.visualization.events.addListener(chart, 'ready', function(){
    // chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
       document.getElementById('algo').value=chart.getImageURI();
    });
    chart.draw(data, options);
      }
}

 function fntGraficoDona(){

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
          ['Task', 'AAAA'],
          ['Chapa',     11],
          ['Tubo PBC',      8],
          ['Alambre',  6],
          ['Pintura Azul', 2],
          ['Cerradura',    7]
        ]);


var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('graficoo'));
  google.visualization.events.addListener(chart, 'ready', function(){
    // chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
       document.getElementById('algo').value=chart.getImageURI();
         });
        chart.draw(data, options);
    }
}


  


$(document).on("change","#graf",function(e){
    e.preventDefault();
  var button = document.getElementById('create_pdf');
  var x = $("#graf").val();
switch (x) {
  case '0':
    fntGraficoBarra();
    button.disabled = false;
   document.querySelector('#keyGraf').value=0; 
    break;
  case '1':
    fntGraficoPastel();
    button.disabled = false;
      document.querySelector('#keyGraf').value=1; 
    break;
  case '2':
    fntGraficoLineal();
    button.disabled = true;
      document.querySelector('#keyGraf').value=2; 
    break;
  case '3':
    fntGraficoDona();
    button.disabled = false;
      document.querySelector('#keyGraf').value=3; 

    break;
  default:
    fntGraficoLineal();
      button.disabled = true;
    break;
}

 });