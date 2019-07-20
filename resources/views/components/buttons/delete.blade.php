{{-- trigger --}}
<button type="button" class="btn btn-outline-primary ml-2" data-toggle="modal" data-target="#delete-modal">
  {{ __('Borrar') }}
</button>

{{-- modal --}}
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalTitle">{{ __('Advertencia') }}</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        {{ __('¿Desea borrar el registro?') }}
        <br>
        {{ __('Si lo hace también se eliminarán TODOS los registros dependientes.') }}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" id="btn-cancel-delete" data-dismiss="modal">
          {{ __('Cancelar') }}
        </button>

        <button type="submit" class="btn btn-primary" form="delete-form">
          {{ __('Aceptar') }}
        </button>
      </div>
    </div>
  </div>
</div>

{{-- delete form --}}
<form action="{{ $slot }}" method="POST" id="delete-form">
  @csrf

  @method('delete')
</form>
