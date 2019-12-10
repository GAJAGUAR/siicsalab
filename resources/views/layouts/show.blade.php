@extends('layouts.app')

@section('content')
  @component('components.container')

    {{-- header --}}
    @component('components.heading_title')
      @yield('title')
    @endcomponent

    {{-- nav --}}
    @component('components.nav')
      @component('components.nav_link')
        @slot('url')
          @yield('urlToEdit')
        @endslot
        {{ __('Editar') }}
      @endcomponent
      @component('components.nav_link')
        @slot('url')
          @yield('urlToAdd')
        @endslot
        @yield('textAdd')
      @endcomponent
    @endcomponent

    @component('components.rule_top')
    @endcomponent

    {{-- main --}}
    @component('components.definition')
      @yield('detail')
    @endcomponent
    @component('components.heading_subtitle')
      @yield('subtitle')
    @endcomponent
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
