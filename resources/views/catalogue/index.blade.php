@extends('layouts.app')

@section('content')
  @component('components.container')

    {{-- header --}}
    @component('components.heading_title')
      {{ __('catálogo') }}
    @endcomponent

    {{-- nav --}}
    @component('components.nav')
      @yield('navLinks')
    @endcomponent

    @component('components.rule_top')
    @endcomponent

    {{-- main --}}
    <div class="row row-cols-1 row-cols-md-3 mt-4">
      @foreach ($elements as $element)
        <div class="col mb-4">
          <div class="card h-100 shadow border-left-primary-lg text-uppercase">
            <div class="card-body">
              <h5 class="card-title mb-2">{{ $element['name'] }}</h5>
              <a
                href="{{ $element['url'] }}"
                class="card-link text-capitalize"
              >
                {{ __('índice') }}</a>
              <a
                href="{{ $element['url'].'/create' }}"
                class="card-link text-capitalize"
              >
                {{ __('agregar') }}
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endcomponent
@endsection
