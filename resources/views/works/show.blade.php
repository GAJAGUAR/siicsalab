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
  {{-- route('work_orders.create') --}}
@endsection

@section('textAdd')
  {{ __('Agregar orden de trabajo') }}
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
      @slot('class', 'text-center th-w-sm')

      {{ __('#') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center th-w-sm')

      {{ __('fecha') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center')

      {{ __('personal') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center th-w-sm')

      {{ __('ensayes') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center th-w-sm')

      {{ __('detalle') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($workOrders as $workOrder)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('class', 'text-center')

        {{ $workOrder->id }}
      @endcomponent

      @component('components.tables.td')
        {{ $workOrder->work_order_date }}
      @endcomponent

      @component('components.tables.td')
        {{ $workOrder->employee_name }}
      @endcomponent

      @component('components.tables.td')
        @slot('class', 'text-center')

        {{ $workOrder->samples }}
      @endcomponent

      @component('components.tables.td_detail')
        @slot('class', 'text-center')

        /work_orders/{{ $workOrder->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection
