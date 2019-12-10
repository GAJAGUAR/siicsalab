<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  {{-- CSRF token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{ config('app.name', 'Sislab') }}</title>
  
  {{-- fonts --}}
  <style>
    /* latin */
    @font-face {
      font-family: 'Nunito';
      font-style: normal;
      font-weight: 200;
      src: local('Nunito ExtraLight'), local('Nunito-ExtraLight'), url(../../fonts/XRXW3I6Li01BKofA-seUYevI.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* latin */
    @font-face {
      font-family: 'Nunito';
      font-style: normal;
      font-weight: 600;
      src: local('Nunito SemiBold'), local('Nunito-SemiBold'), url(../../fonts/XRXW3I6Li01BKofA6sKUYevI.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
  </style>
  
  {{-- styles --}}
  <style>
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      display: block;
      height: 100%;
      margin: 0;
    }
    
    .full-height {
      height: 100vh;
    }
    
    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }
    
    .position-ref {
      position: relative;
    }
    
    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }
    
    .content {
      text-align: center;
    }
    
    .title {
      font-size: 84px;
    }
    
    .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }
    
    .m-b-md {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <div id="app">
    <main class="py-4">
      @component('components.container_fluid')
      <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
          @auth
          <a href="{{ route('panel') }}">{{ __('panel') }}</a>
          @else
          <a href="{{ route('login') }}">{{ __('ingresar') }}</a>
          
          @if (Route::has('register'))
          <a href="{{ route('register') }}">{{ __('registrarse') }}</a>
          @endif
          @endauth
        </div>
        @endif
        
        <div class="content">
          <div class="title m-b-md">
            {{ __('SIICSALAB') }}
          </div>
          
          <div class="links">
            <a href="">{{ __('SIICSA') }}</a>
            <a href="">{{ __('Sisgeo') }}</a>
            <a href="">{{ __('Lorem') }}</a>
            <a href="">{{ __('Ipsum') }}</a>
            <a href="">{{ __('Consectetur') }}</a>
            <a href="">{{ __('Dignissim') }}</a>
            <a href="">{{ __('Aliquet') }}</a>
            <a href="">{{ __('Sagittis') }}</a>
          </div>
        </div>
      </div>
      @endcomponent
    </main>
  </div>
</body>

</html>
