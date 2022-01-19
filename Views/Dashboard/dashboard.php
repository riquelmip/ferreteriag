<?php headerAdmin($data); ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="text-white text-center bg-warning mb-3">
                      <div class="card-header">Total Ventas</div>
                        <div class="card-body">
                          <h5 class="card-title">
                            <span id="totalVenta"></span></h5>
                          <p class="card-text">Monto total en dolares durante el mes de <span id="mesVenta"></span></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="text-white text-center bg-success mb-3">
                    <?php
                            $btnVerVentas = '<button class="btn btn-primary btn-sm btnPermisosRol" onClick="" title="Permisos"><i class="fas fa-eye"></i></button>';
                    ?>
                      <div class="card-header">Total Compras</div>
                        <div class="card-body">
                          <h5 class="card-title"><span id="totalCompra"></span></h5>                
                          <p class="card-text">Monto total en dolares durante el mes de <span id="mesCompra"></span></p>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="text-white bg-primary text-center mb-3">
                      <div class="card-header">Total Crédito</div>
                        <div class="card-body">
                          <h5 class="card-title"><span id="totalCredito"></span></h5>
                          <p class="card-text">Monto total de crédito pendiente en el mes de <span id="mesCredito"></span></p>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        
      <div class="col-md-6">
              <div class="tile">
                <div class="tile-body">
                     <div id="graficoPastel" style="width: 100%; height: 380px; display: flex;"></div>
                    </div>
                  </div>
      </div>
              <div class="col-md-6" >
              <div class="tile">
                <div class="tile-body">
                      <canvas id="myChart" width="400" height="200"></canvas>
                </div>
              </div>
              </div>
        </div>

        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <canvas id="graficoLineal" width="800" height="400" ></canvas>        
                </div>
              </div>
            </div>
          </div>
</main>
<?php footerAdmin($data); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

