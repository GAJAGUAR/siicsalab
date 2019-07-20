@extends('layouts.app')

@section('content')
  @component('components.containers.container')

    {{-- header --}}
    @component('components.headings.title')
      {{ __('Dashboard') }}
    @endcomponent

    {{-- nav --}}
    @component('components.navs.nav')
      @yield('navLinks')
    @endcomponent

    @component('components.miscellaneous.hr')
    @endcomponent

    {{-- main --}}
    <div class="card-deck mt-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="card-title mb-2 text-capitalize">{{ __('32 clientes totales') }}</h2>
          <h3 class="card-subtitle mb-2 text-muted">{{ __('25 activos') }}</h3>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="{{ route('clients.index') }}" class="card-link text-capitalize">{{ __('lista') }}</a>
          <a href="{{ route('clients.create') }}" class="card-link text-capitalize">{{ __('nuevo') }}</a>
        </div>
      </div>

      <div class="card shadow">
        <div class="card-body">
          <h2 class="card-title mb-2 text-capitalize">{{ __('36 obras totales') }}</h2>
          <h3 class="card-subtitle mb-2 text-muted">{{ __('28 activas') }}</h3>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="{{ route('clients.index') }}" class="card-link text-capitalize">{{ __('lista') }}</a>
          <a href="{{ route('clients.create') }}" class="card-link text-capitalize">{{ __('nuevo') }}</a>
        </div>
      </div>

      <div class="card shadow-lg">
        <div class="card-body">
          <h2 class="card-title mb-2 text-capitalize">{{ __('51 órdenes de trabajo totales') }}</h2>
          <h3 class="card-subtitle mb-2 text-muted">{{ __('42 activas') }}</h3>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="{{ route('clients.index') }}" class="card-link text-capitalize">{{ __('lista') }}</a>
          <a href="{{ route('clients.create') }}" class="card-link text-capitalize">{{ __('nuevo') }}</a>
        </div>
      </div>
    </div>
  @endcomponent

  {{-- home modal --}}
  <div class="modal" tabindex="-1" role="dialog" id="home-modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Dashboard') }}</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          {{ __('You are logged in!') }}
        </div>
      </div>
    </div>
  </div>
@endsection
