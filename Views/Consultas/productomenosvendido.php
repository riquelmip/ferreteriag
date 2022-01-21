<?php 
    headerAdmin($data); 
    ?>
    <style >
      .ax{
        display: none;
      }
    </style>

    <main class="app-content">
      <div class="app-title">
        <div class="row">
            <h1 style="margin-right: 50px;"><i class="far fa-chart-bar"></i> <?= $data['page_title'] ?></h1>
   

            <label style="margin-top: 10px;" >Fecha</label>
          <input type="date" id="fecha_venta"  style=" width: 170px; font-size: 16px; margin-right: 40px; margin-left: 10px;" name="fecha_fin" class="form-control form-control-sm"/>

          <select title="Seleccione el gráfico de tu agrado" class="form-control form-control-sm" style=" width:auto; font-size: 16px; margin-right: 50px;" id="graf" name="graf">
            <option value=-1>Gráfico</option>
          <option value="0">Gráfico de barras</option>
          <option value="1">Gráfico de pastel</option>
          <option value="3">Gráfico de dona</option>
          </select>
           
          <button class="btn btn-info btn-sm" id="noTabla" name="noTabla" style="margin-right: 40px;" title="No mostrar tabla" ><i class="far fa-eye-slash"></i></button>
         
        
             <form method="post" id="make" action="<?= base_url2(); ?>ProductMenosVendidoReporte" target="_blank" >
            <!-- para ver o no la tabla -->
            <input type="hidden" name="parametro" id="parametro" value=0>
         <input type="hidden" name="keyGraf" id="keyGraf" value=0>
         <input type="hidden" name="keyTable" id="keyTable" value=0>
              <input type="hidden" id="algo" name="algo" value="1" >
    <button type="submit" name="menosvendido" id="menosvendido" class=" dt-button buttons-pdf buttons-html5 btn btn-danger "title="Generar Reporte" ><i class='fas fa-file-pdf' id="pdf"></i> PDF</button>
   </form>
        </div>
      </div><!-- final de title -->
      <h2 style="text-align: center;">Producto menos vendido</h2>

              <div class="row" id="laTabla">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                <div class="text-right">
                      <a onmouseover="mostrarAyuda();"><i class="fa fa-question fa-lg"></i></a>
                    </div>
                    <br>
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableConsul">
                      <thead>
                        <tr>
                          <th>Descripción</th>
                          <th>Cantidad total vendida</th>
                        </tr>
                      </thead>
                      <tbody id="datos_tabla">
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
<!-- --------------------------------------------------------------------------- -->
         <div id="graficoo"  style="width: 100%; height: 350px; margin: auto; display: flex; align-items: center; justify-content: center; margin-top: 20px;"></div>
        
<?php footerAdmin($data); ?>

<div class="modal fade" id="modalAyuda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h5>Ayuda</h5>
        <hr>
        <h5>Consultas:</h5>
        <p>El campo Fecha:</p>
        <img src="<?= media(); ?>/images/ayuda/fecha.png" alt="" width="200">
        <p>Puede filtrar los registros por las fechas correspondientes, asi mismo en la parte de grafico</p>
        <p>Podra obtener los graficos de dicha información</p>
        <p>El boton de PDF exportara la información en un reporte, y al presionar el botón junto a el, ocultara la tabla</p>
       <p>Indicando que solo desea el grafico sin la tabla de datos</p>

      </div>
      
    </div>
  </div>
</div>