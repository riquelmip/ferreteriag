<?php 
    headerAdmin($data); 
    getModal('modalCargos',$data);
?>
    <div id="contentAjax"></div> 
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-tags"></i> 
Acerca de
            </h1>
        </div>

      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                  
                <div class="tile-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a type="button" class="btn btn-light ms-4 mb-2 bg-white" onclick="window.open('Assets/images/ayuda/Manualdeinstalacion.pdf')" style="
    font-size: larger"><i class=" bi bi-info-circle"></i> Ayuda del sistema</a>
                            </div>
                      <a onmouseover="mostrarAyuda();"><i class="fa fa-question fa-lg"></i></a>
                    </div>
                    <br>

                </div>
              </div>
            </div>
        </div> 
<?php footerAdmin($data); ?>
    