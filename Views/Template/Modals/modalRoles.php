<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formRol" name="formRol">
                <input type="hidden" id="idRol" name="idRol" value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del rol" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Descripción</label>
                  <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del rol" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listaEstado" name="listaEstado" required="">
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


<div class="modal fade" id="modalAyuda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h5>Ayuda</h5>
        <hr>
        <p><b>1. Crear Rol:</b></p>
        <p>Para crear un nuevo rol dar click en el botón "Nuevo +".</p>
        <img src="<?= media(); ?>/images/ayuda/botonnuevo-rol.png" alt="" width="450">
        <br><br>

        <p><b>2. Asignar permisos al rol:</b></p>
        <p>Para asignar los permisos del rol dar click en el botón "Permisos".</p>
        <img src="<?= media(); ?>/images/ayuda/botonpermisos-rol.png" alt="" width="450">
        <br><br>

        <p><b>3. Editar rol:</b></p>
        <p>Para editar los datos del rol dar click en el botón "Editar".</p>
        <img src="<?= media(); ?>/images/ayuda/botoneditar-rol.png" alt="" width="450">
        <br><br>

        <p><b>4. Eliminar rol:</b></p>
        <p>Para eliminar un rol dar click en el botón "Eliminar".</p>
        <img src="<?= media(); ?>/images/ayuda/botoneliminar-rol.png" alt="" width="450">

        

      </div>
      
    </div>
  </div>
</div>
