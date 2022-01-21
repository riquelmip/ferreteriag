var tableRoles;
var divLoading = document.querySelector('#divLoading');
document.addEventListener('DOMContentLoaded', function(){

   cargar_datos();

});


function cargar_datos(){
  $.ajax({
      dataType: "json",
      method: "POST",
      url: base_url+'/Dashboard/getDatos',
  }).done(function(json) {
    console.log(json);


   // document.getElementById('totalCreditos').innerHTML =  "$"+json['totalVenta']['totalVenta'];

  //  document.getElementById('totalVentas').innerHTML =  "$"+json['totalCompra']['totalCompra'];


  }).fail(function(){

  }).always(function(){
    
  });
  
};

