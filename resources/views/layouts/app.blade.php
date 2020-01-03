<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1"
  >

  {{-- CSRF token --}}
  <meta
    name="csrf-token"
    content="{{ csrf_token() }}"
  >

  <title>
    {{ config('app.name', 'Sislab') }}
  </title>

  {{-- fonts --}}
  <link
    href="//fonts.gstatic.com"
    rel="dns-prefetch"
  >

  {{-- styles --}}
  <link
    href="{{ asset('css/app.css') }}"
    rel="stylesheet"
  >
</head>

<body>
<div id="app">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
      <a
        class="navbar-brand"
        href="{{ url('/') }}"
      >
        {{ config('app.name', 'Siicsalab') }}
      </a>
      <button
        class="navbar-toggler"
        type="button"
        aria-expanded="false"
        aria-label="{{ __('Toggle navigation') }}"
        aria-controls="navbarSupportedContent"
        data-target="#navbarSupportedContent"
        data-toggle="collapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse"
        id="navbarSupportedContent"
      >
        {{-- nav links --}}
        @component('components.navbar.menu')
        @endcomponent

        {{-- auth links --}}
        @component('components.navbar.auth')
        @endcomponent
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>
</div>

{{-- scripts --}}
<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/app.js"></script>
</body>

</html>
