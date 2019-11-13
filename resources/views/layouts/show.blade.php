@extends('layouts.app')

@section('content')
  @component('components.containers.container')

    {{-- header --}}
    @component('components.headings.title')
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

    @component('components.miscellaneous.hr_top')
    @endcomponent

    {{-- main --}}
    @component('components.lists.container')
      @yield('detail')
    @endcomponent
    @component('components.headings.subtitle')
      @yield('subtitle')
    @endcomponent
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
