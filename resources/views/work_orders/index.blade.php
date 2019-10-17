@extends('layouts.index')

{{-- header --}}
@section('title', 'órdenes de trabajo')

{{-- nav --}}
@section('navLinks')
  @component('components.navs.item')
    @slot('url')
      {{ route('work_orders.create') }}
    @endslot
    {{ __('nueva') }}
  @endcomponent
  @component('components.navs.item')
    @slot('url')
      {{--{{ route('print.work_orders') }}--}}
    @endslot
    @slot('target')
      {{ __('_blank') }}
    @endslot
    {{ __('imprimir') }}
  @endcomponent
@endsection

{{-- main --}}
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
      {{ __('obra') }}
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
        {{ $workOrder->work_nickname }}
      @endcomponent
      @component('components.tables.td')
        {{ $workOrder->employee_nickname }}
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
    @slot('active', true)
    {{ __('órdenes de trabajo') }}
  @endcomponent
@endsection
