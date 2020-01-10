@extends('layouts.show')

{{-- header --}}
@section('title', $work->work_nickname)

{{-- nav --}}
@section('urlToEdit', $work->id.'/edit')
@section('urlToAdd', route('work_orders.create'))
@section('textAdd', 'agregar orden de trabajo')

{{-- main --}}
@section('detail')
  @component('components.definition_term')
    {{ __('Cliente:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $work->client_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Nombre:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $work->work_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Localización:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $work->work_location }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Notas:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $work->work_notes }}
  @endcomponent
@endsection

@section('subtitle')
  {{ __('órdenes de trabajo:') }}
@endsection
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
        {{ $workOrder->employee_name }}
      @endcomponent
      @component('components.table_cell')
        @slot('style', 'text-center')
        {{ $workOrder->samples }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        /work_orders/{{ $workOrder->id }}
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
    @slot('url', route('clients.index').'/'.$work->client_id)
    {{ $work->client_id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ $work->id }}
  @endcomponent
@endsection
