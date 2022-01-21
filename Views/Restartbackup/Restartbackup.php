
<?php
headerAdmin($data);
?>


   <div id="contentAjax"></div> 
    <main class="app-content">

        <div class="row">
            <div class="col-md-12">
            		<div class="alert alert-info alert-dismissible">
               
                <h4><i class="icon fa fa-info"></i> OBSERVACIÓN</h4>
                Al pulsar sobre el botón 'RESTAURAR' no podrá recuperar los datos que no esten guardados en un respaldo.
              </div>

               <div class="form-group col-md-6">
              <label for="listBases">Historial de Bases de Datos</label>
              <select class="form-control" data-live-search="true" id="listBases" name="listBases" required>
              </select>

            </div>

              		<div class="col-lg-11">
			<p style="text-align: center;"><button type="button" id="restaurar" name="restaurar" class="btn btn-primary btn-lg">RESTAURAR</button></p>
		</div>
              </div>
            </div>
        </div> 
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <?php footerAdmin($data); ?>