var tableRoles;
var divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function(){

   cargar_datos();
    fntGraficoPastel();

});


function cargar_datos(){
  $.ajax({
      dataType: "json",
      method: "POST",
      url: base_url+'/Dashboard/getDatos',
  }).done(function(json) {
    console.log(json);
  var fecha = new Date();
    var mes = fecha.getMonth() + 1;

    document.getElementById('totalVenta').innerHTML =  "$ "+json['totalVenta']['totalVenta'];
    document.getElementById('mesVenta').innerHTML = obtenerMes(mes);
    document.getElementById('totalCompra').innerHTML =  "$ "+json['totalCompra']['totalCompra'];
    document.getElementById('mesCompra').innerHTML = obtenerMes(mes);
    document.getElementById('totalCredito').innerHTML =  "$ "+json['totalCredito']['totalCredito'];    
    document.getElementById('mesCredito').innerHTML = obtenerMes(mes);
    
   
    fntGraficoBarra(json);
    fntGraficoLineal(json);
  
    


  }).fail(function(){

  }).always(function(){
    
  });
  
};

function fntGraficoPastel() {

  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawChart);
  var ventas = [];
  function drawChart() {
    $.ajax({
      dataType: "json",
      method: "POST",
      url: base_url + "/Dashboard/creditosProveedores",
    }).done(function (json) {
      console.log("EL consultar", json);
      for (var i in json) ventas.push([i, json[i]]);
        for (let index = 0; index < ventas.length; index++) {
        
        var data = new google.visualization.DataTable();
        data.addColumn("string", "Week");
        data.addColumn("number", "Retail");
        json.forEach(function (row) {
          data.addRow([row.nombre, parseFloat(row.total)]);
        });
      }
      var options = {
        title: "Créditos a proveedores",
        is3D: true,
      };

      var chart = new google.visualization.PieChart(
        document.getElementById("graficoPastel")
      );

      chart.draw(data, options);
    });
  }
  
  
}

function fntGraficoBarra(json) {
  var fecha = new Date();
  var mes = [];
    var total= [];
    for (var i = 0; i < json['ventas'].length ; i++) {
      mes.push(json['ventas'][i].mes);
      total.push(json['ventas'][i].total);
    }
    
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: mes,
        datasets: [{
            label: 'Total en ventas de los ultimos 3 meses del año '+fecha.getFullYear(),
            data: total,
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
               }
            }
        }
    });

}

function fntGraficoLineal(json){
 var categoria = [];
  var stock= [];
    console.log(json['productos'].length);
    for (var i = 0; i < json['productos'].length ; i++) {
      categoria.push(json['productos'][i].nombre);
      stock.push(json['productos'][i].stock);
    }
    const ctx = document.getElementById('graficoLineal').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: categoria,
        datasets: [{
            label: 'Stock de productos por categoria ',
            data: stock,
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(220, 20, 60)',
              'rgb(0, 128, 0)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(220, 20, 60)',
                'rgb(0, 128, 0)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
               }
            }
          }
    });
}

function obtenerMes(mes){
  
    switch(mes){
      case 1:
        return mes = "Enero";
      break;
      case 2:
        return mes = "Febrero";
      break;
      case 3:
        return mes = "Marzo";
      break;
      case 4:
        return mes = "Abril";
      break;
      case 5:
        return mes = "Mayo";
      break;
      case 6:
        return mes = "Junio";
      break;
      case 7:
        return mes = "Julio";
      break;
      case 8:
        return mes = "Agosto";
      break;
      case 9:
        return mes = "Septiembre";
      break;
      case 10:
        return mes = "Octubre";
      break;
      case 11:
        return mes = "Noviembre";
      break;
      case 12:
        return mes = "Diciembre";
      break;
    }
}