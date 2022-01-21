<!-- Modal -->
<div class="modal fade" id="modalFormMarca" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formMarca" name="formMarca">
                <input type="hidden" id="idmarca" name="idmarca" value="">
                <div class="form-group">
                  <label class="control-label">Nombre Marca</label>
                  <input class="form-control" id="txtNombreMarca" name="txtNombreMarca" type="text" placeholder="Marca" required="">
                  <p style="font-size: 13px;"><span id="msje"></span></p>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="marcaEstado" name="marcaEstado" required="">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
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
        <h5>Pasos para registrar un nueva Marca:</h5>
        <p>1. Dar Clic al botón Nuevo:</p>
        <img src="<?= media(); ?>/images/ayuda/nuevo-empleado.png" alt="" width="80">
        <p>2. Completar todos los campos de el formulario.</p>
        <p style="color: blue;">Nota: Todos los campos son obligatorios</p>

        <p>3. Al completar todos los campos, dar clic en "Guardar".</p>

        <h5>Pasos Para Editar un registro</h5>
        <p>1. Dar clic a el botón "Editar".</p>
        <img src="<?= media(); ?>/images/ayuda/editar-empleado.png" alt="" width="40">
        <p>2. Modificar el valor de los registros.</p>
        <p>3. Dar clic en el botón "Actualizar" para editar el registro seleccionado.</p>

        <h5>Pasos Para Dar de baja a un registro</h5>
        <p>1. Dar clic a el botón "Dar de baja".</p>
        <img src="<?= media(); ?>/images/ayuda/basurero.png" alt="" width="40">
        <p>2. Cuando el sistema le pregunte si desea dar de baja el registro, dar clic en "Si!" para dar de baja y en "No!" para cancelar la acción.</p>
   
      </div>
      
    </div>
  </div>
</div>
