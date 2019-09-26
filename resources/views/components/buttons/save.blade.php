{{-- trigger --}}
<button id="btn-save"
        class="btn btn-primary text-capitalize {{ $style ?? '' }}"
        type="button"
        data-target="#modal-save"
        data-toggle="modal">
  {{ __('guardar') }}
</button>

{{-- modal --}}
<div id="modal-save"
     class="modal fade"
     role="dialog"
     tabindex="-1"
     aria-labelledby="modalSaveTitle"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"
       role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modalSaveTitle"
            class="modal-title text-capitalize">
          {{ __('advertencia') }}
        </h5>
        <button id="btn-close"
                class="close"
                type="button"
                data-dismiss="modal"
                aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('¿Guardar el registro?') }}
      </div>
      <div class="modal-footer">
        <button id="btn-cancel-save"
                class="btn btn-outline-primary"
                type="button"
                data-autofocus="true"
                data-dismiss="modal">
          {{ __('Cancelar') }}
        </button>
        <button id="btn-accept-save"
                class="btn btn-primary"
                form="form"
                type="submit">
          {{ __('Guardar') }}
        </button>
      </div>
    </div>
  </div>
</div>
