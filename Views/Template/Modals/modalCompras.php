<!-- Modal -->
<div class="modal fade" id="modalViewCadenaAv" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModalV"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalViewBody">
        <p id="cadena"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
        <p><b>1. Realizar una nueva compra:</b></p>
        <p>Para realizar una nueva compra dar click en el botón "Nueva +".</p>
        <img src="<?= media(); ?>/images/ayuda/nuevacompra.png" alt="" width="450">
        <p><b>2. Ver detalles de la compra:</b></p>
        <p>Para ver los detalles de una compra presionar el botón Detalles</p>
        <img src="<?= media(); ?>/images/ayuda/detallecompra.png" alt="" width="450">
       </div>
    </div>
  </div>
</div>
