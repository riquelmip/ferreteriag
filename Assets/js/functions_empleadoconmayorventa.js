
var tableRoles;
var divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function(){
    cargar_datos();

  });
function cargar_datos(){

  var datos = {"consultar_info":"si_consultala"}
  $.ajax({
      dataType: "json",
      method: "POST",
      url: base_url+"/Consultas/empleadoconmayorventas",
      data : datos,
  }).done(function(json) {
      console.log("EL consultar",json);
      $("#datos_tabla").empty().html(json.htmlDatosTabla);
      inicializar_tabla("tableConsul");
  }).fail(function(){

  }).always(function(){
     
  });
}





function alerta_recargartabla(titulo, mensaje, tipo){
  
  Swal.fire({
    title: titulo,
    text: mensaje,
    icon: tipo,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Aceptar'
  }).then((result) => {
    if (result.isConfirmed) {
      cargar_datos();
    } 
  });

}

function inicializar_tabla(tabla){
  $('#'+tabla).dataTable( {
      "responsive": true,
      "aServerSide": true,
      "autoWidth": false,
      "deferRender": true,
      "retrieve": true,
      "processing": true,
      "paging": true,
      "language": {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
          }
      },
      "columns":[
          {"data":"nombre"},
          {"data":"apellido"},
          {"data":"idempleado"},
          {"data":"monto"},
  
      ],
      'dom': '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      'buttons': [
          {
              "extend": "copyHtml5",
              "text": "<i class='far fa-copy'></i>",
              "titleAttr":"Copiar",
              "className": "btn btn-primary"
          },{
              "extend": "excelHtml5",
              "text": "<i class='fas fa-file-excel'></i>",
              "titleAttr":"Exportar a Excel",
              "className": "btn btn-primary"
          },{
              "extend": "pdfHtml5",
              "text": "<i class='fas fa-file-pdf'></i>",
              "titleAttr":"Exportar a PDF",
              "className": "btn btn-primary"
          },{
              "extend": "csvHtml5",
              "text": "<i class='fas fa-file-csv'></i>",
              "titleAttr":"Exportar a CSV",
              "className": "btn btn-primary"
          }
      ],
      "bDestroy": true,
      "iDisplayLength": 10,
      "order":[[1,"desc"]]  
  });



  

}




$(document).on("change","#fecha_venta",function(e){
  var fecha_fin = $("#fecha_venta").val();
   document.querySelector('#parametro').value=fecha_fin;
   document.getElementById("graficoo").innerHTML = "";
   document.getElementById("graficoo").innerHTML = "<div id=\"graficoo\" ></div>";
   $.ajax({
     dataType: "json",
     method: "POST",
     url: base_url+"/Consultas/empleadomayorventafiltradaporfecha/"+fecha_fin,
   
 }).done(function(json) {
     console.log("EL consultar",json);
     
     $("#datos_tabla").empty().html(json.htmlDatosTabla);
    
     inicializar_tabla("tableConsul");
 
 }).fail(function(){
 
 }).always(function(){
 
 });
  
 
 
 });
 
 
 
 
  
 
 //Grafico Pastel
 function fntGraficoPastel(){
  var fecha_fin = $("#fecha_venta").val();
  if (fecha_fin=="") {
 google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);
 var result = [];
 function drawChart() {
   $.ajax({
     dataType: "json",
     method: "POST",
     url: base_url+"/Consultas/empleadosconmayorventas", 
 }).done(function(json) {
     console.log("EL consultar",json);
     for(var i in json)
     result.push([i, json [i]]);
     for (let index = 0; index < result.length; index++) {
       console.log(json[0].monto);
       console.log(json[0].nombre);
       var data = new google.visualization.DataTable();
 data.addColumn('string', 'Week');
 data.addColumn('number', 'Retail');
 json.forEach(function (row) {
 data.addRow([
 row.nombre,
 parseFloat(row.monto)
 ]);
 });
   }
   var options = {
     title: 'Empleados con mayor indice de ventar indice de compra',
     is3D: true,
   };
   var chart = new google.visualization.PieChart(document.getElementById('graficoo'));
   google.visualization.events.addListener(chart, 'ready', function(){
   document.getElementById('algo').value=chart.getImageURI();
          });
         chart.draw(data, options);
       });
     }  }else{
      var fecha_fin = $("#fecha_venta").val();
      google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    var result = [];
    function drawChart() {
      $.ajax({
        dataType: "json",
        method: "POST",
        url: base_url + "/Consultas/empleadosconmayorventasfecha/" + fecha_fin,
      }).done(function(json) {
          console.log("EL consultar",json);
          for(var i in json)
          result.push([i, json [i]]);
          for (let index = 0; index < result.length; index++) {
            console.log(json[0].monto);
            console.log(json[0].nombre);
            var data = new google.visualization.DataTable();
      data.addColumn('string', 'Week');
      data.addColumn('number', 'Retail');
      json.forEach(function (row) {
      data.addRow([
      row.nombre,
      parseFloat(row.monto)
      ]);
      });
        }
        var options = {
          title: 'Empleados con mayor indice de ventar indice de compra',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('graficoo'));
        google.visualization.events.addListener(chart, 'ready', function(){
        document.getElementById('algo').value=chart.getImageURI();
               });
              chart.draw(data, options);
            });
          } 
     }
 }
 //Fin Grafico de Pastel
 
 
 
 //Inicio de grafico Barra
 function fntGraficoBarra(){
  var fecha_fin = $("#fecha_venta").val();
  if (fecha_fin=="") {
   google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    var result = [];
       function drawChart() {
         $.ajax({
           dataType: "json",
           method: "POST",
           url: base_url+"/Consultas/empleadosconmayorventas", 
       }).done(function(json) {
           console.log("EL consultar",json);
           for(var i in json)
           result.push([i, json [i]]);
           for (let index = 0; index < result.length; index++) {
             console.log(json[0].monto);
             console.log(json[0].nombre);
             var data = new google.visualization.DataTable();
   data.addColumn('string', 'Week');
   data.addColumn('number', 'Retail');
   json.forEach(function (row) { 
   data.addRow([      
   row.nombre,
   parseFloat(row.monto)
     ]);
   });
         }
     var options = {
       title: 'Empleados con mayor indice de ventar indice de compra',
           colors: ['#1b9e77', '#d95f02', '#7570b3'],
            legend: { position: "none" },
         };
       var chart_area = document.getElementById('graficoo');
       var chart = new google.visualization.ColumnChart(chart_area);
       google.visualization.events.addListener(chart, 'ready', function(){
          document.getElementById('algo').value=chart.getImageURI();
       });
       chart.draw(data, options);
       });
       } }else{
        var fecha_fin = $("#fecha_venta").val();
        google.charts.load("current", { packages: ["corechart"] });
      google.charts.setOnLoadCallback(drawChart);
      var result = [];
      function drawChart() {
        $.ajax({
          dataType: "json",
          method: "POST",
          url: base_url + "/Consultas/empleadosconmayorventasfecha/" + fecha_fin,
           }).done(function(json) {
               console.log("EL consultar",json);
               for(var i in json)
               result.push([i, json [i]]);
               for (let index = 0; index < result.length; index++) {
                 console.log(json[0].monto);
                 console.log(json[0].nombre);
                 var data = new google.visualization.DataTable();
       data.addColumn('string', 'Week');
       data.addColumn('number', 'Retail');
       json.forEach(function (row) { 
       data.addRow([      
       row.nombre,
       parseFloat(row.monto)
         ]);
       });
             }
         var options = {
           title: 'Empleados con mayor indice de ventar indice de compra',
               colors: ['#1b9e77', '#d95f02', '#7570b3'],
                legend: { position: "none" },
             };
           var chart_area = document.getElementById('graficoo');
           var chart = new google.visualization.ColumnChart(chart_area);
           google.visualization.events.addListener(chart, 'ready', function(){
              document.getElementById('algo').value=chart.getImageURI();
           });
           chart.draw(data, options);
           });
           }
       }
 }
 //Fin de grafico Barra
 
 //Inicio de grafico Dona
  function fntGraficoDona(){
    var fecha_fin = $("#fecha_venta").val();
    if (fecha_fin=="") {
 google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);
 var result = [];
 function drawChart() {
   $.ajax({
     dataType: "json",
     method: "POST",
     url: base_url+"/Consultas/empleadosconmayorventas",
 }).done(function(json) {
     console.log("EL consultar",json);
     for(var i in json)
     result.push([i, json [i]]);
     for (let index = 0; index < result.length; index++) {
           console.log(json[0].monto);
           console.log(json[0].nombre);
           var data = new google.visualization.DataTable();
           data.addColumn('string', 'Week');
           data.addColumn('number', 'Valor');
           json.forEach(function (row) {
           data.addRow([
           row.nombre,
           parseFloat(row.monto)
         ]);
       });
     }
 var options = {
   title: 'Empleados con mayor indice de ventar indice de compra',
           pieHole: 0.4,
         };
         var chart = new google.visualization.PieChart(document.getElementById('graficoo'));
   google.visualization.events.addListener(chart, 'ready', function(){
     
        document.getElementById('algo').value=chart.getImageURI();
          });
         chart.draw(data, options);
 });
     } }else{
      var fecha_fin = $("#fecha_venta").val();
      google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    var result = [];
    function drawChart() {
      $.ajax({
        dataType: "json",
        method: "POST",
        url: base_url + "/Consultas/empleadosconmayorventasfecha/" + fecha_fin,
      }).done(function(json) {
          console.log("EL consultar",json);
          for(var i in json)
          result.push([i, json [i]]);
          for (let index = 0; index < result.length; index++) {
                console.log(json[0].monto);
                console.log(json[0].nombre);
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Week');
                data.addColumn('number', 'Valor');
                json.forEach(function (row) {
                data.addRow([
                row.nombre,
                parseFloat(row.monto)
              ]);
            });
          }
      var options = {
        title: 'Empleados con mayor indice de ventar indice de compra',
                pieHole: 0.4,
              };
              var chart = new google.visualization.PieChart(document.getElementById('graficoo'));
        google.visualization.events.addListener(chart, 'ready', function(){
          
             document.getElementById('algo').value=chart.getImageURI();
               });
              chart.draw(data, options);
      });
          }
     }
 }
 //Inicio de grafico Dona
 
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

   case '3':
     fntGraficoDona();
     button.disabled = false;
       document.querySelector('#keyGraf').value=3; 
 
     break;
   default:

     break;
 }
 
  });