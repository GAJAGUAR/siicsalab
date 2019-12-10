@extends('layouts.index')

{{-- header --}}
@section('title', 'clientes')

{{-- nav --}}
@section('urlToNew', route('clients.create'))
@section('urlToPrint', '#')

{{-- main --}}
@section('thead')
  @component('components.table_row')
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center')
      {{ __('razón social') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __('obras') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($clients as $client)
    @component('components.table_row')
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $loop->iteration }}
      @endcomponent
      @component('components.table_cell')
        {{ $client->client_name }}
      @endcomponent
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $client->works }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        /clients/{{ $client->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('clientes') }}
  @endcomponent
@endsection
