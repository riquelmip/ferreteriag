<?php headerAdmin($data); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Inicio</a></li>

    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row">
            <div class="col-md-4">
              <div class="text-white text-center bg-warning mb-3">
                <div class="card-header">Total de Ventas</div>
                <div class="card-body">
                  <h5 class="card-title"><span id="totalCreditos">0.00</span></h5>
                  <p class="card-text">Ventas totales realizadas</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-white text-center bg-success mb-3">
                <?php
                $btnVerVentas = '<button class="btn btn-primary btn-sm btnPermisosRol" onClick="" title="Permisos"><i class="fas fa-eye"></i></button>';
                ?>
                <div class="card-header">Compras Totales</div>
                <div class="card-body">
                  <h5 class="card-title"><span id="totalVentas">$0.00</span></h5>
                  <p class="card-text"> Compras totales realizadas</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-white bg-primary text-center mb-3">
                <div class="card-header">Clientes Incobrables</div>
                <div class="card-body">
                  <h5 class="card-title"><span id="totalCompras">0</span></h5>
                  <p class="card-text">Cartera Incobrable</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>







</main>
<?php footerAdmin($data); ?>