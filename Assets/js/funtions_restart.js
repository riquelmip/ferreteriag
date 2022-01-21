document.addEventListener('DOMContentLoaded', function(){
	cargar_datos();

});

function cargar_datos(){
    var datos = {"consultar_info":"si_consultala"}
    $.ajax({
        dataType: "json",
        method: "POST",
        url: base_url+"/Restartbackup/getFiles",
        data : datos,
    }).done(function(json) {
       
         document.querySelector('#listBases').innerHTML = json.listaFiles;
         $('#listBases').selectpicker('refresh');
        $('#listBases').selectpicker('render');

    }).fail(function(){

    }).always(function(){
       });
}

$(document).on("click","#restaurar",function restar() {
var datos = {"listBases":document.querySelector('#listBases').value}
	   $.ajax({
        dataType: "json",
        method: "POST",
        url: base_url+"/Restartbackup/resturar",
        data : datos,
    }).done(function(json) {
    	swal("EXITO", "Restauracion de la base completada" ,"success");
    
    }).fail(function(){
    	swal("EXITO", "Restauracion de la base completada" ,"success");
    }).always(function(){
       });
});
