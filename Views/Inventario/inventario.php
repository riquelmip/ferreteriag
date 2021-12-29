<?php 
    headerAdmin($data); 
?>
    <div id="contentAjax"></div> 
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-box-open"></i> <?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fas fa-box-open fa-lg"></i></li>
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
                          <th>Categoria</th>
                          <th>Descripción</th>
                          <th>Stock</th>
                          <th>Precio Venta</th>
                          <th>Precio Compra</th>
                          <th>Unidad</th>
                          <th>Acciones</th>
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
    