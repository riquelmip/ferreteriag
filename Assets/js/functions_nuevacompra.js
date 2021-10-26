let tableProducto;
let rowTable = "";
let divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function(){
    tableProducto = $('#tableProducto').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Nuevacompra/getProductos",
            "dataSrc":""
        },
        "columns":[
            {"data":"idproducto"},
            {"data":"descripcion"},
            {"data":"options"}
        ]
    });



    if (document.querySelector("#formProducto")) {
   let formProducto = document.querySelector("#formProducto");
            formProducto.onsubmit = function(e) {
                e.preventDefault();
                $("#listaProducto").val(JSON.stringify(arrayIdProductos)); 
                $("#listsub").val(JSON.stringify(arreglo)); 
              let intProve = document.querySelector("#listProve").value;
                if(arrayIdProductos.length==0)
                {
                    swal("Atención", "Todos los campos son obligatorios." , "error");
                    return false;
                }
    
                let elementsValid = document.getElementsByClassName("valid");
                for (let i = 0; i < elementsValid.length; i++) { 
                    if(elementsValid[i].classList.contains('is-invalid')) { 
                        swal("Atención", "Por favor verifique los campos en rojo." , "error");
                        return false;
                    } 
                }          
                divLoading.style.display = "flex";
                let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                let ajaxUrl = base_url+'/Nuevacompra/setCompra'; 
                let formData = new FormData(formProducto);
                request.open("POST",ajaxUrl,true);
                request.send(formData);
                request.onreadystatechange = function(){
    
                    if(request.readyState == 4 && request.status == 200){
                        console.log(request.responseText);
                        let objData = JSON.parse(request.responseText);
                        if(objData.estado)
                        {
                            formProducto.reset();

                            swal({
                                title: 'Compra Realizada',
                                text: objData.msg,
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Ok!'
                              }, 
                              function(){
                                   window.location.href = base_url+"/compras";
                              });
                           
                        }else{
                            swal("Error", objData.msg , "error");
                            
                        }
                    }
                    divLoading.style.display = "none";
                
                    return false;
                   
                }
    
            }
        }
    
    }, false);


window.addEventListener('load', function() {
    fntSelects();
}, false);



var arreglo= [];

$(document).on("change",".precioc",function(){
    console.log("Aqui");
    var num = arrayIdProductos.length;
    console.log(arrayIdProductos.length);
    var data = $(this).attr("data-numero");
    var producto = $(this).attr("data-producto");
    console.log(data);
    console.log(producto);

    var cantidad = document.querySelector("#cantidad_"+data).value;
    var numero = document.querySelector("#preciocompra_"+data).value;
    console.log(cantidad);
    console.log(numero);
    var n = parseFloat(numero*0.1);
  console.log(n);
   var na = parseFloat(numero)+parseFloat(n);
  var subtotal = parseInt(cantidad)*parseFloat(numero);
    var totalventa = na.toFixed(2);
    document.querySelector("#precioventa_"+data).value = totalventa;

    var totalSub = subtotal.toFixed(2);
    document.querySelector("#subtotal_"+data).value = totalSub;
    for (var i = 0; i < arreglo.length; i++) {
        if (arreglo[i].id == producto) {
            arreglo[i].subtotal = totalSub;
        }
      }

console.log(arreglo);
var sum = 0;


for (var i = 0; i < arreglo.length; i++) {
  var dato =  arreglo[i].subtotal;
  sum += parseFloat(dato);
  }
var sumtotal = sum.toFixed(2);
    $("#totalfinal").empty();
    $("#totalfinal").append("$");
    var totalant = document.querySelector("#subtotal_"+data).value;
    var pru = parseFloat(totalant);
        $("#totalfinal").append(sumtotal);
        
    for (var i = 0; i < arrayIdProductos.length; i++) {
        if (arrayIdProductos[i].id == producto) {
            arrayIdProductos[i].cantidad = cantidad;
            arrayIdProductos[i].preciocompra = numero;
            arrayIdProductos[i].precioventa = na;
        }
      }
      console.log(arrayIdProductos);
   });



   $(document).on("change",".precioc1",function(){
    console.log("Aqui cantidad");


    var data = $(this).attr("data-numero");
    var producto = $(this).attr("data-producto");



    for (var i = 0; i < arrayIdProductos.length; i++) {
        if (arrayIdProductos[i].id == producto) {
            var cantidad = document.querySelector("#cantidad_"+data).value;
            arrayIdProductos[i].cantidad = cantidad;

        }
      }
      console.log(arrayIdProductos);
   });








function fntSelects(){

let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
let ajaxUrl = base_url+'/Nuevacompra/getSelects';
request.open("GET",ajaxUrl,true);
request.send();
request.onreadystatechange = function(){
    if(request.readyState == 4 && request.status == 200){
        let objData = JSON.parse(request.responseText);//Lo que trae el JSON del select de NuevaCompra

        
        document.querySelector('#listProve').innerHTML = objData.proveedores;
        $('#listProve').selectpicker('render');
        console.log(objData.proveedores);

      
    }
}


}



var arrayIdProductos = [];

function fntAddCoroAv(idprod){

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Nuevacompra/getProducto/'+idprod;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            console.log(request.responseText);
            let objData = JSON.parse(request.responseText);
           console.log(objData.dataidproducto);   
            if(objData.status)
            {
                if(arrayIdProductos.length === 0){
                   var numero = 1;
                    $("#divDetalles").append(
                        '<div class="row" style="padding:5px 15px">'+
                
                        '<!-- Descripción del coro -->'+
                        
                        '<div class="row" >'+
                        
                        '<div class="input-group">'+
                            
                        
                        '<span class="input-group-addon"><button type="button" style="margin-left: 35px;"  class="btn btn-danger btn-xs quitarCoro" idProducto="'+objData.dataidproducto+'"><i class="fa fa-times"></i></button></span>'+
                        '&nbsp;'+'&nbsp;'+'<input type="text" class="form-control " style="margin-left: 15px;width: 470px;" id="'+objData.dataidproducto+'" value="'+objData.datadescripcion+'" readonly required="">'+
                        '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" max="5000" style="margin-left: 5px;width: 90px;"   class="form-control precioc" data-producto="'+objData.dataidproducto+'" id="cantidad_'+numero+'" data-numero="'+numero+'" required="">'+
                        '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" max="5000" step=".01"  style="margin-left: 20px;width: 90px;"   class="form-control precioc" data-producto="'+objData.dataidproducto+'" id="preciocompra_'+numero+'" data-numero="'+numero+'" required="">'+
                        '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" step=".01" style="margin-left: 20px;width: 90px;"   class="form-control precioc"  id="precioventa_'+numero+'" data-numero="'+numero+'" readonly>'+
                        '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" step=".01" style="margin-left: 20px;width: 90px;"   class="form-control precioc"  id="subtotal_'+numero+'" data-numero="'+numero+'" readonly>'+
                           
            
                        '</div>'+
            
                        '</div>'+
            
                    '</div>')
                        

                            arrayIdProductos.push({ "id" : objData.dataidproducto, 
                            "descripcion" :objData.datadescripcion,
                            "cantidad":document.querySelector("#cantidad_"+numero).value,
                            "preciocompra":document.querySelector("#preciocompra_"+numero).value,
                            "precioventa":document.querySelector("#precioventa_"+numero).value
                        
                        })
            console.log(arrayIdProductos);  
                     
            arreglo.push({ "subtotal" : document.querySelector("#subtotal_"+numero).value,"id" : objData.dataidproducto
        })
                }else{
                    var numerocontador =  arrayIdProductos.length+1;
                    console.log(numerocontador);
                    var existe=0;
                    for (var i = 0; i < arrayIdProductos.length; i++) {
                        if (arrayIdProductos[i].id == objData.dataidproducto) {
                            swal({
                                title: "Ese coro ya esta añadido!",
                                type: "error",
                                confirmButtonText: "¡Cerrar!"
                              });
                              existe=1;
                          break;
                        }
                      }

                    if(existe==0){ //si el coro ya existe en el array
                        $("#divDetalles").append(
                            '<div class="row" style="padding:5px 15px">'+
                
                            '<!-- Descripción del coro -->'+
                            
                            '<div class="row" >'+
                            
                            '<div class="input-group">'+
                                
                            
                            '<span class="input-group-addon"><button type="button" style="margin-left: 35px;"  class="btn btn-danger btn-xs quitarCoro" idProducto="'+objData.dataidproducto+'"><i class="fa fa-times"></i></button></span>'+
                            '&nbsp;'+'&nbsp;'+'<input type="text" class="form-control " style="margin-left: 15px;width: 470px;" id="'+objData.dataidproducto+'" value="'+objData.datadescripcion+'" readonly required="">'+
                            '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" max="5000" style="margin-left: 5px;width: 90px;"   class="form-control precioc" data-producto="'+objData.dataidproducto+'" id="cantidad_'+numerocontador+'" data-numero="'+numerocontador+'" required="">'+
                            '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" max="5000" step=".01" style="margin-left: 20px;width: 90px;"   class="form-control precioc" data-producto="'+objData.dataidproducto+'" id="preciocompra_'+numerocontador+'" data-numero="'+numerocontador+'" required="">'+
                            '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" step=".01" style="margin-left: 20px;width: 90px;"   class="form-control precioc"  id="precioventa_'+numerocontador+'" data-numero="'+numerocontador+'" readonly>'+
                            '&nbsp;'+'&nbsp;'+'<input type="number"  autocomplete="off" min="1" step=".01" style="margin-left: 20px;width: 90px;"   class="form-control precioc"  id="subtotal_'+numerocontador+'" data-numero="'+numerocontador+'" readonly>'+  
                
                            '</div>'+
                
                            '</div>'+
                
                        '</div>')
                            console.log(objData.dataidproducto);
                        //agregamos el id del coro al array detalles
                        //arrayIdProductos.push(objData.data.idcoro);
                        arrayIdProductos.push({ "id" : objData.dataidproducto, 
                        "descripcion" :objData.datadescripcion,
                        "cantidad":document.querySelector("#cantidad_"+numerocontador).value,
                        "preciocompra":document.querySelector("#preciocompra_"+numerocontador).value,
                        "precioventa":document.querySelector("#precioventa_"+numerocontador).value
                        }
                        
                        
                        )
                        //revisamos si se inserto
                        console.log(arrayIdProductos);
                        arreglo.push({ "subtotal" : document.querySelector("#subtotal_"+numerocontador).value,"id" : objData.dataidproducto
                    })
                    }
                }     
            }
        }
    }

}


/*=============================================
QUITAR CORO DE LA CADENA 
=============================================*/

$("#formProducto").on("click", "button.quitarCoro", function(){
    var idCoro = $(this).attr("idProducto");
	$(this).parent().parent().parent().parent().remove();

    //buscamos ese idcoro en el array
    //var index = arrayIdProductos.idcoro.indexOf(idCoro);
	//quitamos ese coro del array detalles
   // if (index > -1) {
    //    arrayIdProductos.splice(index, 1);
    //}
    

    for (var i = 0; i < arrayIdProductos.length; i++) {
        if (arrayIdProductos[i].id == idCoro) {
          arrayIdProductos.splice(i, 1);
          break;
        }
      }
      console.log(arrayIdProductos);

})







