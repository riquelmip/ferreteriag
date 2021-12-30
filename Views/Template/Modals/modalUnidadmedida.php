<!-- Modal -->
<div class="modal fade" id="modalFormUnidades" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Unidad Medida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formUnidades" name="formUnidades">
                <input type="hidden" id="idunidad" name="idunidad" value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" maxlength="100" autocomplete="off"  id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de la unidad medida" required="">
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
        <h5>Pasos para registrar una Nueva Unidad de Medida:</h5>
        <p>1. Dar Clic al botón Nueva:</p>
        <img src="<?= media(); ?>/images/ayuda/nueva-unidad.png" alt="" width="80">
        <p>2. Completar todos los campos de el formulario.</p>
        <p style="color: blue;">Nota: Todos los campos son obligatorios</p>

        <p>3. Al completar el campo de la nueva Unidad de Medida, dar clic en "Guardar" para  el registro.</p>

        <h5>Pasos Para Editar un registro</h5>
        <p>1. Dar clic a el botón "Editar".</p>
        <img src="<?= media(); ?>/images/ayuda/editar-empleado.png" alt="" width="40">
        <p>2. Modificar el valor de los registros.</p>
        <p>3. Dar clic en el botón "Actualizar" para editar el registro seleccionado.</p>

        <h5>Pasos Para Dar de baja a un registro</h5>
        <p>1. Dar clic a el botón "Eliminar".</p>
        <img src="<?= media(); ?>/images/ayuda/basurero.png" alt="" width="40">
        <p>2. Cuando el sistema le pregunte si desea eliminar el registro, dar clic en "Si!" para eliminar y en "No!" para cancelar la acción.</p>
   
      </div>
      
    </div>
  </div>
</div>

