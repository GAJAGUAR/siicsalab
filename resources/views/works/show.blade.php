@extends('layouts.show')

{{-- header --}}
@section('title')
  {{ $work->work_nickname }}
@endsection

{{-- nav --}}
@section('urlEdit')
  {{ $work->id }}/edit
@endsection
@section('urlAdd')
  {{ route('work_orders.create') }}
@endsection
@section('textAdd')
  {{ __('agregar orden de trabajo') }}
@endsection

{{-- main --}}
@section('detail')
  @component('components.lists.term')
    {{ __('Cliente:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $work->client_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Nombre:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $work->work_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Localización:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $work->work_location }}
  @endcomponent
@endsection

@section('subtitle')
  {{ __('órdenes de trabajo:') }}
@endsection
@section('thead')
  @component('components.tables.tr')
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-md')
      {{ __('fecha') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')
      {{ __('personal') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('ensayes') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($workOrders as $workOrder)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $workOrder->id }}
      @endcomponent
      @component('components.tables.td')
        {{ $workOrder->work_order_date }}
      @endcomponent
      @component('components.tables.td')
        {{ $workOrder->employee_name }}
      @endcomponent
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $workOrder->samples }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('style', 'text-center')
        /work_orders/{{ $workOrder->id }}
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
    @slot('url', route('clients.index').'/'.$work->client_id)
    {{ $work->client_id }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ $work->id }}
  @endcomponent
@endsection
