{{-- trigger --}}
<button
  class="btn btn-outline-primary text-capitalize ml-2 {{ $style ?? '' }}"
  id="btn-delet"
  type="button"
  data-toggle="modal"
  data-target="#delete-modal"
>
  {{ __('borrar') }}
</button>

{{-- modal --}}
<div
  class="modal fade"
  id="delete-modal"
  role="dialog"
  tabindex="-1"
  aria-hidden="true"
  aria-labelledby="deleteModalTitle"
>
  <div
    class="modal-dialog modal-dialog-centered"
    role="document"
  >
    <div class="modal-content">
      <div class="modal-header">
        <h5
          id="deleteModalTitle"
          class="modal-title text-capitalize"
        >
          {{ __('advertencia') }}
        </h5>
        <button
          class="close"
          type="button"
          aria-label="Close"
          data-dismiss="modal"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('¿Desea borrar el registro?') }}
        <br>
        {{ __('Si lo hace también se eliminarán TODOS los registros dependientes.') }}
      </div>
      <div class="modal-footer">
        <button
          class="btn btn-outline-primary text-capitalize"
          id="btn-cancel-delete"
          type="button"
          data-autofocus="true"
          data-dismiss="modal"
        >
          {{ __('cancelar') }}
        </button>
        <button
          class="btn btn-primary text-capitalize"
          form="delete-form"
          type="submit"
        >
          {{ __('aceptar') }}
        </button>
      </div>
    </div>
  </div>
</div>

{{-- delete form --}}
<form id="delete-form"
      action="{{ $slot }}"
      method="POST">
  @csrf
  @method('delete')
</form>
