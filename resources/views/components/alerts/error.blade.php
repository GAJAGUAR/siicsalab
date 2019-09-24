@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show"
       role="alert">
    <h4 class="alert-heading text-capitalize">{{ __('error') }}</h4>
    <hr>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button class="close"
            type="button"
            data-dismiss="alert"
            aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
