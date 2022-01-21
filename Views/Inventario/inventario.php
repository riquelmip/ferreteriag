<?php 
    headerAdmin($data); 
?>
    <div id="contentAjax"></div> 
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-box-tissue"></i> <?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fas fa-box-tissue fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/inventario"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                <div class="text-right">
                      <a onmouseover="mostrarAyuda();"><i class="fa fa-question fa-lg"></i></a>
                    </div>
                    <br>
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableInventario">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Descripción</th>
                          <th>Marca</th>
                          <th>Categoria</th>
                          <th>Stock</th>
                          <th>Unidad de Medida</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
  
<?php footerAdmin($data); ?>

  <!-- MODAL PARA LA AYUDA -->

<div class="modal fade" id="modalAyuda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h5>Ayuda</h5>
        <hr>
        <h5>Inventarios:</h5>
        <p>El campo Buscar:</p>
        <img src="<?= media(); ?>/images/ayuda/buscador.png" alt="" width="200">
        <p>Permite hacer una busqueda especìfica de los datos del inventario.</p>
        
        <p>Boteones, permiten Exportar o copiar los datos de la tabla en formato PDF/EXEL/CVS:</p>
        <img src="<?= media(); ?>/images/ayuda/exportar.png" alt="" width="200">
        
        <p>Filtros perrmitidos en la busqueda.</p>
        <img src="<?= media(); ?>/images/ayuda/datos.png" alt="" width="450">
        <p>Nota: El filtro muestra resultados automaticamente.</p>
   
      </div>
      
    </div>
  </div>
</div>

    