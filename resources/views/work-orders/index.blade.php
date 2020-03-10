@extends('layouts.index')

{{-- header --}}
@section('title', 'órdenes de trabajo')

{{-- nav --}}
@section('urlToNew', route('work-orders.create'))
@section('urlToPrint', '#')

{{-- main --}}
@section('thead')
  @component('components.table_row')
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-md')
      {{ __('fecha') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center')
      {{ __('obra') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center')
      {{ __('personal') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')

      {{ __('ensayes') }}
    @endcomponent
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($workOrders as $workOrder)
    @component('components.table_row')
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $workOrder->id }}
      @endcomponent
      @component('components.table_cell')
        {{ $workOrder->work_order_date }}
      @endcomponent
      @component('components.table_cell')
        {{ $workOrder->work_nickname }}
      @endcomponent
      @component('components.table_cell')
        {{ $workOrder->employee_nickname }}
      @endcomponent
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $workOrder->samples }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        /work-orders/{{ $workOrder->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('órdenes de trabajo') }}
  @endcomponent
@endsection
