@extends('layouts.show')

{{-- header --}}
@section('title')
  {{ $employee->employee_nickname }}
@endsection

{{-- nav --}}
@section('urlEdit')
  {{ $employee->id }}/edit
@endsection
@section('urlAdd')
  {{ route('employees.create') }}
@endsection
@section('textAdd')
  {{ __('agregar personal') }}
@endsection

{{-- main --}}
@section('detail')
  @component('components.lists.term')
    {{ __('Nombre:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $employee->employee_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Escolaridad:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $employee->scholarship_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Cumpleaños:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $employee->employee_birthdate }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Género:') }}
  @endcomponent
  @component('components.lists.description')
    @if ($employee->employee_gender == 0)
      {{ __('MASCULINO') }}
    @else
      {{ __('FEMENINO') }}
    @endif
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
      {{ __('obra') }}
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
        @slot('style', 'text-center')
        {{ $workOrder->samples }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('style', 'text-center')
        /employee_orders/{{ $workOrder->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumbs.item')
    @slot('url', route('employees.index'))
    {{ __('personal') }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ $employee->id }}
  @endcomponent
@endsection
