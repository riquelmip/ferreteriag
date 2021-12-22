var tableVentas;
var divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function(){

	tableVentas = $('#tableVentas').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ventas/getVentas",
            "dataSrc":""
        },
        "columns":[
            {"data":"idventa"},
            {"data":"fecha"},
            {"data":"monto"},
            {"data":"cliente"},
            {"data":"estado"},
            {"data":"opciones"}
        ],
        "responsive":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"asc"]]  
    });




});

$('#tableVentas').DataTable();


function fntViewCadenaAv(idcadena){

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Compras/getCadena/'+idcadena;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#titleModalV").innerHTML = "<div class='text-left'><b>"+"Compra #"+objData.data[0].idcompra+"<br>"+"Proveedor: "+objData.data[0].nombre+"</b></div>";
                var srtCadenaCoros = "";
                for (var i = 0; i < objData.data.length; i++) {
                    srtCadenaCoros = srtCadenaCoros+ "<table class='table table-hover table-bordered'><thead><tr><th># de Compra</th><th># de Producto</th><th>Cantidad</th><th>Precio de Venta</th></tr> <tr><td>"+"000"+objData.data[i].iddetalle+"</td><td>"+"000"+objData.data[i].idproducto+"</td><td>"+objData.data[i].cantidad+"</td><td>"+objData.data[i].precioventa+"</td></tr></thead><tbody></tbody></table>";
                  }
                document.querySelector("#modalViewBody").innerHTML = "<div class='text-center'>"+srtCadenaCoros+"</div>";
                
                $('#modalViewCadenaAv').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}





