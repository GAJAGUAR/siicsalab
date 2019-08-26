@extends('layouts.index')

{{-- header --}}
@section('title', 'clientes')

{{-- nav --}}
@section('navLinks')
  @component('components.navs.nav_link')
    @slot('url')
      {{ route('clients.create') }}
    @endslot

    {{ __('nuevo') }}
  @endcomponent

  @component('components.navs.nav_link')
    @slot('url')
      {{--{{ route('print.clients') }}--}}
    @endslot

    @slot('target')
      {{ __('_blank') }}
    @endslot

    {{ __('imprimir') }}
  @endcomponent
@endsection

{{-- main --}}
@section('thead')
  @component('components.tables.tr')
    @component('components.tables.th')
      @slot('class', 'text-center th-w-sm')

      {{ __('#') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center')

      {{ __('razón social') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center th-w-sm')

      {{ __('obras') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center th-w-sm')

      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($clients as $client)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('class', 'text-center')

        {{ $loop->iteration }}
      @endcomponent

      @component('components.tables.td')
        {{ $client->client_name }}
      @endcomponent

      @component('components.tables.td')
        @slot('class', 'text-center')

        {{ $client->works }}
      @endcomponent

      @component('components.tables.td_detail')
        @slot('class', 'text-center')

        /clients/{{ $client->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection
