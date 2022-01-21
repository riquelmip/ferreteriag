var tableRoles;
var divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function(){

   cargar_datos();

});



function cargar_datos(){
  divLoading.style.display = "flex";
  var datos = {"consultar_info":"si_consultala"}
  $.ajax({
      dataType: "json",
      method: "POST",
      url: base_url+"/Dashboard/getDatos",
      data : datos,
  }).done(function(json) {
   // document.getElementById('totalCreditos').innerHTML =  "$"+json['totalVenta']['totalVenta'];

  //  document.getElementById('totalVentas').innerHTML =  "$"+json['totalCompra']['totalCompra'];

  }).fail(function(){

  }).always(function(){
      divLoading.style.display = "none";
  });
}