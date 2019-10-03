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
    @component('components.navs.nav')
      @yield('navLinks')
    @endcomponent

    @component('components.miscellaneous.hr_top')
    @endcomponent

    {{-- main --}}
    @component('components.tables.table_primary')
      @slot('responsive')
        @yield('responsive')
      @endslot
      @slot('thead')
        @yield('thead')
      @endslot
      @yield('tbody')
    @endcomponent

    @component('components.miscellaneous.hr_bottom')
    @endcomponent
  @endcomponent
@endsection
