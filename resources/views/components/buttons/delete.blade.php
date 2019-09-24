{{-- trigger --}}
<button id="btn-delet" type="button"
        class="btn btn-outline-primary text-capitalize ml-2 {{ $style ?? '' }}"
        data-toggle="modal"
        data-target="#delete-modal">
  {{ __('borrar') }}
</button>

{{-- modal --}}
<div class="modal fade"
     id="delete-modal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="deleteModalTitle"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"
       role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-capitalize"
            id="deleteModalTitle">
          {{ __('advertencia') }}
        </h5>
        <button type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('¿Desea borrar el registro?') }}
        <br>
        {{ __('Si lo hace también se eliminarán TODOS los registros dependientes.') }}
      </div>
      <div class="modal-footer">
        <button type="button"
                class="btn btn-outline-primary text-capitalize auto-focus"
                id="btn-cancel-delete"
                data-dismiss="modal">
          {{ __('cancelar') }}
        </button>
        <button type="submit"
                class="btn btn-primary text-capitalize"
                form="delete-form">
          {{ __('aceptar') }}
        </button>
      </div>
    </div>
  </div>
</div>

{{-- delete form --}}
<form action="{{ $slot }}"
      method="POST"
      id="delete-form">
  @csrf
  @method('delete')
</form>
