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
          @yield('urlToExit')
        @endslot
        {{ __('salir') }}
      @endcomponent
    @endcomponent

    @component('components.rule_top')
    @endcomponent

    {{-- main --}}
    <form
      action="@yield('action')"
      id="form"
      method="POST"
    >
      @csrf
      @yield('formContent')
    </form>
    @component('components.button_save')
    @endcomponent

    {{-- footer --}}
    @component('components.rule_bottom')
    @endcomponent

    @component('components.breadcrumb')
      @yield('breadcrumb')
    @endcomponent
  @endcomponent
@endsection
