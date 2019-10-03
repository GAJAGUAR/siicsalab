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
    @component('components.navs.nav')
      @component('components.buttons.exit')
        @yield('exitUrl')
      @endcomponent
    @endcomponent

    @component('components.miscellaneous.hr_top')
    @endcomponent

    {{-- main --}}
    <form action="@yield('formRoute')" method="POST" id="form">
      @csrf
      @yield('formContent')
    </form>

    @component('components.miscellaneous.hr_bottom')
    @endcomponent

    {{-- footer --}}
    @component('components.buttons.save')
    @endcomponent
  @endcomponent
@endsection
