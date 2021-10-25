<?php 
    headerAdmin($data); 
    getModal('modalEmpleado',$data);
  
?>
    <div id="contentAjax"></div> 
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tie"></i> <?= $data['page_title'] ?>
              <?php if (!empty($_SESSION['permisosMod']['escribir'])) { ?>
                <button class="btn btn-success" type="button" style="margin-left: 20px" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
              <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/Empleado"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableEmpleado">
                      <thead>
                        <tr>
                          <th>DUI</th>
                          <th>NIT</th>
                          <th>Nombre</th>        
                          <th>Apellido</th>
                          <!-- <th>Dirección</th>
                          <th>Telefono</th>
                          <th>Fecha N/C</th> -->
                          <th>Estado</th>
                          <th>Cargo</th>
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
    