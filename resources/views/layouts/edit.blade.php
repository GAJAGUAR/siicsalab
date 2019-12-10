@extends('layouts.app')

@section('content')
  @component('components.container')

    {{-- alerts --}}
    @component('components.alert_save')
    @endcomponent
    @component('components.alert_error')
    @endcomponent

    {{-- header --}}
    @component('components.heading_title')
      @yield('title')
    @endcomponent

    {{-- nav --}}
    @component('components.nav')
      @component('components.nav_link')
        @slot('url')
          @yield('urlToClose')
        @endslot
        {{ __('cerrar edición') }}
      @endcomponent
      @component('components.nav_link')
        @slot('url')
          @yield('urlToExit')
        @endslot
        {{ __('salir') }}
      @endcomponent
    @endcomponent

    @component('components.rule_top')
    @endcomponent

    {{-- main --}}
    <form action="@yield('action')" method="POST" id="form">
      @csrf
      @method('put')
      @yield('formContent')
    </form>

    @component('components.button_save')
    @endcomponent
    @component('components.button_delete')
      @yield('action')
    @endcomponent

    {{-- footer --}}
    @component('components.rule_bottom')
    @endcomponent

    @component('components.breadcrumb')
      @yield('breadcrumb')
    @endcomponent
  @endcomponent
@endsection
