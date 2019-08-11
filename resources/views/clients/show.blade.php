@extends('layouts.show')

{{-- header --}}
@section('title')
  {{ $client->client_nickname }}
@endsection

{{-- nav --}}
@section('urlEdit')
  {{ $client->id }}/edit
@endsection

@section('urlAdd')
  {{-- route('works.create') --}}
@endsection

@section('textAdd')
  {{ __('Agregar obra') }}
@endsection

{{-- main --}}
@section('detail')
  @component('components.lists.term')
    {{ __('Razón social:') }}
  @endcomponent

  @component('components.lists.description')
    {{ $client->client_name }}
  @endcomponent

  @component('components.lists.term')
    {{ __('R.F.C.:') }}
  @endcomponent

  @component('components.lists.description')
    {{ $client->client_register }}
  @endcomponent

  @component('components.lists.term')
    {{ __('Domicilio fiscal:') }}
  @endcomponent

  @component('components.lists.description')
    {{ $client->client_location }}
  @endcomponent
@endsection

@section('subtitle')
  {{ __('obras:') }}
@endsection

@section('thead')
  @component('components.tables.tr')
    @component('components.tables.th')
      {{ __('#') }}
    @endcomponent

    @component('components.tables.th')
      {{ __('Nombre') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center')

      {{ __('detalle') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($works as $work)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('class', 'text-center')

        {{ $loop->iteration }}
      @endcomponent

      @component('components.tables.td')
        {{ $work->work_name }}
      @endcomponent

      @component('components.tables.td_detail')
        @slot('class', 'text-center')

        /works/{{ $work->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection
