@extends('layouts.index')

{{-- header --}}
@section('title', 'pendientes')

{{-- nav --}}
@section('urlToNew', route('samples.create'))
@section('urlToPrint', '#')

{{-- main --}}
@section('thead')
  @component('components.table_row')
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center text-uppercase th-w-sm')
      {{ __('ot') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-md')
      {{ __('recibido') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center')
      {{ __('empleo') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center')
      {{ __('material') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($samples as $sample)
    @component('components.table_row')
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $sample->id }}
      @endcomponent
      @component('components.table_cell')
        {{ $sample->work_order_id }}
      @endcomponent
      @component('components.table_cell')
        {{ $sample->sample_receipt_date }}
      @endcomponent
      @component('components.table_cell')
        {{ $sample->sample_purpose_name }}
      @endcomponent
      @component('components.table_cell')
        {{ $sample->sample_description }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        /samples/{{ $sample->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('pendientes') }}
  @endcomponent
@endsection
