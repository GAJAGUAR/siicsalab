@extends('layouts.app')

@section('content')
  @component('components.containers.container')

    {{-- alerts --}}
    @component('components.alerts.save')
    @endcomponent
    @component('components.alerts.error')
    @endcomponent

    {{-- header --}}
    @component('components.headings.title')
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

    @component('components.miscellaneous.hr_top')
    @endcomponent

    {{-- main --}}
    <form action="@yield('action')" method="POST" id="form">
      @csrf
      @method('put')
      @yield('formContent')
    </form>

    @component('components.buttons.save')
    @endcomponent
    @component('components.buttons.delete')
      @yield('action')
    @endcomponent

    {{-- footer --}}
    @component('components.miscellaneous.hr_bottom')
    @endcomponent

    @component('components.breadcrumbs.container')
      @yield('breadcrumb')
    @endcomponent
  @endcomponent
@endsection
