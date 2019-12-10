{{-- trigger --}}
<button
  class="btn btn-primary text-capitalize {{ $style ?? '' }}"
  id="btn-save"
  type="button"
  data-target="#modal-save"
  data-toggle="modal"
>
  {{ __('guardar') }}
</button>

{{-- modal --}}
<div
  class="modal fade"
  id="modal-save"
  role="dialog"
  tabindex="-1"
  aria-labelledby="modalSaveTitle"
  aria-hidden="true"
>
  <div
    class="modal-dialog modal-dialog-centered"
    role="document"
  >
    <div class="modal-content">
      <div class="modal-header">
        <h5
          id="modalSaveTitle"
          class="modal-title text-capitalize"
        >
          {{ __('advertencia') }}
        </h5>
        <button
          class="close"
          id="btn-close"
          type="button"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('¿Guardar el registro?') }}
      </div>
      <div class="modal-footer">
        <button
          class="btn btn-outline-primary"
          id="btn-cancel-save"
          type="button"
          data-autofocus="true"
          data-dismiss="modal"
        >
          {{ __('Cancelar') }}
        </button>
        <button
          class="btn btn-primary"
          id="btn-accept-save"
          form="form"
          type="submit"
        >
          {{ __('Guardar') }}
        </button>
      </div>
    </div>
  </div>
</div>
