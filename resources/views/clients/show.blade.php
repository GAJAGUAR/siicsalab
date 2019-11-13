@extends('layouts.show')

{{-- header --}}
@section('title', $client->client_nickname)

{{-- nav --}}
@section('urlToEdit', $client->id.'/edit')
@section('urlToAdd', route('works.create'))
@section('textAdd', 'agregar obra')

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
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')
      {{ __('nombre') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('ot') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($works as $work)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $loop->iteration }}
      @endcomponent
      @component('components.tables.td')
        {{ $work->work_name }}
      @endcomponent
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $work->work_orders }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('style', 'text-center')
        /works/{{ $work->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumbs.item')
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ $client->id }}
  @endcomponent
@endsection
