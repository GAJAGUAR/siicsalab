@extends('layouts.index')

{{-- header --}}
@section('title', 'obras')

{{-- nav --}}
@section('urlToNew', route('works.create'))
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
    @slot('active', true)
    {{ __('obras') }}
  @endcomponent
@endsection
