
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

  
    // fntConsulta();
    //prueba();
    pruebin();
  });

$('#tableConsul').DataTable();

function prueba(){

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'AAAA'],
          ['XXX1',     11],
          ['XXX2',      8],
          ['XXX3',  6],
          ['XXX4', 2],
          ['XXX5',    7]
        ]);

        var options = {
          title: 'Titulo',
          is3D: true,
        };
        var chart_area = document.getElementById('grafico');
        var chart = new google.visualization.LineChart(chart_area);
    
        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        google.visualization.events.addListener(chart, 'ready', function(){
          chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
         });
         chart.draw(data, options);
      }
}

function pruebin() {
     google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
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
   document.getElementById('testing').classList.remove("ax");
 document.getElementById('graficoo').style.display = 'none';

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'AAAA'],
          ['XXX1',     11],
          ['XXX2',      8],
          ['XXX3',  6],
          ['XXX4', 2],
          ['XXX5',    7]
        ]);

        var options = {
          title: 'Titulo de el grafico de ejemplo ',
          is3D: true,
        };
        var chart_area = document.getElementById('grafico');
        var chart = new google.visualization.LineChart(chart_area);
    
        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        google.visualization.events.addListener(chart, 'ready', function(){
          chart_area.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
         });
         chart.draw(data, options);
           $('#hidden_html').val($(chart_area).html());
  //para cuando se filtre en el combo mandar los parametros tambien
$('#parametros').val('filtralo');
  $('#make_pdf').submit();
      }

 });


 $('#noTabla').click(function(){
  var llave=document.getElementById('llave').value;
  if(llave==0){
 document.getElementById('laTabla').style.display = 'none';
document.getElementById('llave').value=1;
  }else{
 document.getElementById('laTabla').style.display = 'block';
document.getElementById('llave').value=0;
  }

   });