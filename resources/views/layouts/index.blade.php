@extends('layouts.app')

@section('content')
  @component('components.container')

    {{-- alerts --}}
    @component('components.alert_delete')
    @endcomponent

    {{-- header --}}
    @component('components.heading_title')
      @yield('title')
    @endcomponent

    {{-- nav --}}
    @component('components.nav')
      @component('components.nav_link')
        @slot('url')
          @yield('urlToNew')
        @endslot
        {{ __('nuevo') }}
      @endcomponent
      @component('components.nav_link')
        @slot('url')
          @yield('urlToPrint')
        @endslot
        @slot('target', '_blank')
        {{ __('imprimir') }}
      @endcomponent
    @endcomponent

    @component('components.rule_top')
    @endcomponent

    {{-- main --}}
    @component('components.table')
      @slot('thead')
        @yield('thead')
      @endslot
      @yield('tbody')
    @endcomponent

    {{-- footer --}}
    @component('components.rule_bottom')
    @endcomponent

    @component('components.breadcrumb')
      @yield('breadcrumb')
    @endcomponent
  @endcomponent
@endsection
