@extends('layouts.show')

{{-- header --}}
@section('title', 'órden de trabajo '.$workOrder->id)

{{-- nav --}}
@section('urlToEdit', $workOrder->id.'/edit')
@section('urlToAdd', route('samples.create'))
@section('textAdd', 'agregar ensaye')

{{-- main --}}
@section('detail')
  @component('components.definition_term')
    {{ __('Fecha:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $workOrder->work_order_date }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Cliente:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $workOrder->client_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Obra:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $workOrder->work_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Localización:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $workOrder->work_location }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Personal:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $workOrder->employee_name }}
  @endcomponent
@endsection
@section('subtitle')
  {{ __('ensayes:') }}
@endsection

@section('thead')
  @component('components.table_row')
    @component('components.table_cell_header')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
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
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index').'/'.$workOrder->client_id)
    {{ $workOrder->client_id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumb_item')
  @slot('url', route('works.index').'/'.$workOrder->work_id)
    {{ $workOrder->work_id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('work-orders.index'))
    {{ __('órdenes de trabajo') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ $workOrder->id }}
  @endcomponent
@endsection
