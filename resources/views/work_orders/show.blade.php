@extends('layouts.show')

{{-- header --}}
@section('title')
  órden de trabajo {{ $workOrder->id }}
@endsection

{{-- nav --}}
@section('urlEdit')
  {{ $workOrder->id }}/edit
@endsection
@section('urlAdd')
  {{ route('samples.create') }}
@endsection
@section('textAdd')
  {{ __('agregar ensaye') }}
@endsection

{{-- main --}}
@section('detail')
  @component('components.lists.term')
    {{ __('Fecha:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $workOrder->work_order_date }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Cliente:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $workOrder->client_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Obra:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $workOrder->work_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Localización:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $workOrder->work_location }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Personal:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $workOrder->employee_name }}
  @endcomponent
@endsection
@section('subtitle')
  {{ __('ensayes:') }}
@endsection

@section('thead')
  @component('components.tables.tr')
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-md')
      {{ __('recibido') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')

      {{ __('empleo') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')
      {{ __('material') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($samples as $sample)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $sample->id }}
      @endcomponent
      @component('components.tables.td')
        {{ $sample->sample_receipt_date }}
      @endcomponent
      @component('components.tables.td')
        {{ $sample->purpose_name }}
      @endcomponent
      @component('components.tables.td')
        {{ $sample->sample_description }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('style', 'text-center')
        /samples/{{ $sample->id }}
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
    @slot('url', route('clients.index').'/'.$workOrder->client_id)
    {{ $workOrder->client_id }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumbs.item')
  @slot('url', route('works.index').'/'.$workOrder->work_id)
    {{ $workOrder->work_id }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('url', route('work_orders.index'))
    {{ __('órdenes de trabajo') }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ $workOrder->id }}
  @endcomponent
@endsection
