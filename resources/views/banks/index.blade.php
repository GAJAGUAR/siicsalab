@extends('layouts.index')

{{-- header --}}
@section('title', 'bancos')

{{-- nav --}}
@section('urlToNew', route('banks.create'))
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
      {{ __('nombre') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center')
      {{ __('ubicación') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($banks as $bank)
    @component('components.table_row')
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $bank->id }}
      @endcomponent
      @component('components.table_cell')
        {{ $bank->bank_name }}
      @endcomponent
      @component('components.table_cell')
        {{ $bank->bank_location }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        /banks/{{ $bank->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('bancos') }}
  @endcomponent
@endsection
