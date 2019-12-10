@extends('layouts.index')

{{-- header --}}
@section('title', 'personal')

{{-- nav --}}
@section('urlToNew', route('employees.create'))
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
  @foreach ($employees as $employee)
    @component('components.table_row')
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $loop->iteration }}
      @endcomponent
      @component('components.table_cell')
        {{ $employee->employee_name }}
      @endcomponent
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $employee->work_orders }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        /employees/{{ $employee->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('personal') }}
  @endcomponent
@endsection
