@extends('layouts.show')

{{-- header --}}
@section('title', $client->client_nickname)

{{-- nav --}}
@section('urlToEdit', $client->id.'/edit')
@section('urlToAdd', route('works.create'))
@section('textAdd', 'agregar obra')

{{-- main --}}
@section('detail')
  @component('components.definition_term')
    {{ __('Razón social:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $client->client_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('R.F.C.:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $client->client_register }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Domicilio fiscal:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $client->client_location }}
  @endcomponent
@endsection

@section('subtitle')
  {{ __('obras:') }}
@endsection
@section('thead')
  @component('components.table_row')
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center')
      {{ __('nombre') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __('ot') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($works as $work)
    @component('components.table_row')
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $loop->iteration }}
      @endcomponent
      @component('components.table_cell')
        {{ $work->work_name }}
      @endcomponent
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $work->work_orders }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        /works/{{ $work->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ $client->id }}
  @endcomponent
@endsection
