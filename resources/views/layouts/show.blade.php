@extends('layouts.app')

@section('content')
  @component('components.containers.container')

    {{-- header --}}
    @component('components.headings.title')
      @yield('title')
    @endcomponent

    {{-- nav --}}
    @component('components.navs.nav')
      @component('components.navs.nav_link')
        @slot('url')
          @yield('urlEdit')
        @endslot

        {{ __('Editar') }}
      @endcomponent

      @component('components.navs.nav_link')
        @slot('url')
          @yield('urlAdd')
        @endslot

        @yield('textAdd')
      @endcomponent
    @endcomponent

    @component('components.miscellaneous.hr')
    @endcomponent

    {{-- main --}}
    @component('components.lists.definition')
      @yield('detail')
    @endcomponent

    @component('components.headings.subtitle')
      @yield('subtitle')
    @endcomponent

    @component('components.miscellaneous.hr')
    @endcomponent

    @component('components.tables.table_primary')
      @slot('thead')
        @yield('thead')
      @endslot

      @yield('tbody')
    @endcomponent
  @endcomponent
@endsection
