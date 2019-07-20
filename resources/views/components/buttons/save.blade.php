{{-- trigger --}}
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#save-modal">
  {{ __('Guardar') }}
</button>

{{-- modal --}}
<div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="saveModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="saveModalTitle">{{ __('Advertencia') }}</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        {{ __('¿Guardar el registro?') }}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" id="btn-cancel-save" data-dismiss="modal">
          {{ __('Cancelar') }}
        </button>

        <button type="submit" class="btn btn-primary" form="form">
          {{ __('Guardar') }}
        </button>
      </div>
    </div>
  </div>
</div>