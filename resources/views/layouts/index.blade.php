@extends('layouts.app')

@section('content')
  @component('components.containers.container')

    {{-- alerts --}}
    @component('components.alerts.delete')
    @endcomponent

    {{-- header --}}
    @component('components.headings.title')
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

    @component('components.miscellaneous.hr_top')
    @endcomponent

    {{-- main --}}
    @component('components.tables.table_primary')
      @slot('thead')
        @yield('thead')
      @endslot
      @yield('tbody')
    @endcomponent

    {{-- footer --}}
    @component('components.miscellaneous.hr_bottom')
    @endcomponent

    @component('components.breadcrumbs.container')
      @yield('breadcrumb')
    @endcomponent
  @endcomponent
@endsection
