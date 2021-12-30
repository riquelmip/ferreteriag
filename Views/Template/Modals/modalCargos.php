<!-- Modal -->
<div class="modal fade" id="modalFormCargos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formCargos" name="formCargos">
                <input type="hidden" id="idCargo" name="idCargo" value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" autocomplete="off"  id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del Cargo" required="">
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#" data-dismiss="modal" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAyuda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h5>Ayuda</h5>
        <hr>
        <p><b>1. Realizar un nuevo cargo:</b></p>
        <p>Para realizar un nuevo cargo dar click en el botón "Nueva +".</p>
        <img src="<?= media(); ?>/images/ayuda/nuevocargo.png" alt="" width="450">
       

        <p><b>2. Editar un cargo:</b></p>
        <p>Para editar un cargo presione el botón Editar</p>
        <img src="<?= media(); ?>/images/ayuda/nuevoeditar.png" alt="" width="450">

        <br><br>
        <p><b>3. Eliminar un cargo:</b></p>
        <p>Para eliminar un cargo presione el botón Eliminar.</p>
        <img src="<?= media(); ?>/images/ayuda/nuevoeliminar.png" alt="" width="450">



      </div>
      
    </div>
  </div>
</div>
