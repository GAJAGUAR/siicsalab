{{-- trigger --}}
<button id="btn-delet"
        class="btn btn-outline-primary text-capitalize ml-2 {{ $style ?? '' }}"
        type="button"
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
        <h5 id="deleteModalTitle"
            class="modal-title text-capitalize">
          {{ __('advertencia') }}
        </h5>
        <button class="close"
                type="button"
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
        <button id="btn-cancel-delete"
                class="btn btn-outline-primary text-capitalize"
                type="button"
                data-autofocus="true"
                data-dismiss="modal">
          {{ __('cancelar') }}
        </button>
        <button class="btn btn-primary text-capitalize"
                type="submit"
                form="delete-form">
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
