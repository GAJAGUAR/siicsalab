<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- CSRF token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Sislab') }}</title>

  {{-- fonts --}}
  @component('components.miscellaneous.fonts_local')
  @endcomponent

  {{-- styles --}}
  @component('components.miscellaneous.styles_local')
  @endcomponent
</head>

<body>
<div id="app">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Sislab') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- nav links --}}
        @component('components.navbars.nav_links')
        @endcomponent

        {{-- auth links --}}
        @component('components.navbars.auth_links')
        @endcomponent
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>
</div>

{{-- scripts --}}
@component('components.miscellaneous.scripts_local')
@endcomponent
</body>

</html>
