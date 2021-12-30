<!-- Modal -->
<div class="modal fade" id="modalFormProveedores" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">

              <form id="formProveedor" name="formProveedor">

                <input type="hidden" id="idProveedor" name="idProveedor" value="">

                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" maxlength="100"  autocomplete="off" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del proveedor" required="">
                  <p style="font-size: 13px;"><span id="msje1"></span></p>
                </div>

                <div class="form-group">
                  <label class="control-label">Dirección</label>
                  <textarea class="form-control"  autocomplete="off" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Dirección del proveedor" required=""></textarea>
                </div>


                  <div class="form-group">
                  <label class="control-label">Teléfono</label>
                  <input class="form-control" autocomplete="off"  id="txtNumero" data-mask="0000-0000" name="txtNumero" type="tel" placeholder="0000-0000" required="">
                </div>

                   <div class="form-group">
                  <label class="control-label">Contacto(Nombre)</label>
                  <input class="form-control" maxlength="100" autocomplete="off"  id="txtContacto" name="txtContacto" type="text" placeholder="Nombre Completo" required="">
                  <p style="font-size: 13px;"><span id="msje2"></span></p>
                </div>


                  <div class="form-group">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listaEstado" name="listaEstado" required="">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
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
        <h5>Pasos para registrar un nuevo Proveedor:</h5>
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

