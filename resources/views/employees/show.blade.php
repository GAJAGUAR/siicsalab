@extends('layouts.show')

{{-- header --}}
@section('title', $employee->employee_nickname)

{{-- nav --}}
@section('urlToEdit', $employee->id.'/edit')
@section('urlToAdd', route('work_orders.create'))
@section('textAdd', 'agregar orden de trabajo')

{{-- main --}}
@section('detail')
  @component('components.definition_term')
    {{ __('Nombre:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $employee->employee_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Cargo:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $employee->position_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Escolaridad:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $employee->scholarship_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Nacimiento:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $employee->employee_birthdate }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Género:') }}
  @endcomponent
  @component('components.definition_description')
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
        @slot('style', 'text-center')
        {{ $workOrder->samples }}
      @endcomponent
      @component('components.table_cell_finder')
        @slot('style', 'text-center')
        {{ route('work_orders.index').'/'.$workOrder->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('employees.index'))
    {{ __('personal') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ $employee->id }}
  @endcomponent
@endsection
