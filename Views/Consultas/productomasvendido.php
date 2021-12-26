<?php 
    headerAdmin($data); 
    ?>
    <style >
      .ax{
        display: none;
      }
    </style>
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <main class="app-content">
      <div class="app-title">
        <div class="row">
            <h1 style="margin-right: 50px;"><i class="far fa-chart-bar"></i> <?= $data['page_title'] ?></h1>
   

            <label style="margin-top: 10px;" >Fecha de Venta</label>
          <input type="date" id="fecha_venta"  style=" width: 170px; font-size: 16px; margin-right: 40px; margin-left: 10px;" name="fecha_fin" class="form-control form-control-sm"/>

          <select title="Seleccione el gráfico de tu agrado" class="form-control form-control-sm" style=" width:auto; font-size: 16px; margin-right: 50px;" id="graf" name="graf">
            <option value=-1>Gráfico</option>
          <option value="0">Gráfico de barras</option>
          <option value="1">Gráfico de pastel</option>
          <option value="2">Gráfico de lineas</option>
          <option value="3">Gráfico de dona</option>
          </select>
           
          <button class="btn btn-info btn-sm" id="noTabla" name="noTabla" style="margin-right: 40px;" title="No mostrar tabla" ><i class="far fa-eye-slash"></i></button>
         
        
             <form method="post" id="make_pdf" action="consultas/reportes" target="_blank" >
            <!-- para ver o no la tabla -->
            <input type="hidden" name="parametro" id="parametro" value=0>
         <input type="hidden" name="keyGraf" id="keyGraf" value=0>
         <input type="hidden" name="keyTable" id="keyTable" value=0>
              <input type="hidden" id="algo" name="algo" value="1" >
    <button type="button" name="create_pdf" id="create_pdf" class=" dt-button buttons-pdf buttons-html5 btn btn-danger "title="Generar Reporte" ><i class='fas fa-file-pdf' id="pdf"></i> PDF</button>
   </form>
        </div>
      </div><!-- final de title -->
      <h2 style="margin-right: 50px;"><i class="far fa-chart-bar"></i>Producto más vendido</h2>

              <div class="row" id="laTabla">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
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

       
        <div class="container ax" id="testing"> 
        <div id="grafico" style="width: 80%; height: 350px; margin: auto; display: flex; align-items: center; justify-content: center; margin-top: 20px;"></div>
      
        </div>
       

   

        
<?php footerAdmin($data); ?>
