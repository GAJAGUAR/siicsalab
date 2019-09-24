@if (session('status'))
  <div class="alert alert-warning alert-dismissible fade show"
       role="alert">
    <h4 class="alert-heading text-capitalize">{{ __('aviso') }}</h4>
    <hr>
    <p class="mb-0">{{ session('status') }}</p>
    <button class="close"
            type="button"
            data-dismiss="alert"
            aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
