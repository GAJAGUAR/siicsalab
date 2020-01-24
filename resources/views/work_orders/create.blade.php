@extends('layouts.create')

{{-- header --}}
@section('title', 'nueva orden de trabajo')

{{-- nav --}}
@section('urlToExit', route('work_orders.index'))

{{-- main --}}
@section('action', route('work_orders.store'))
@section('formContent')

  {{-- work id flield --}}
  @component('components.input_select')
    @slot('label', 'Obra')
    @slot('fieldName', 'work_id')
    @slot('value', old('work_id'))
    @slot('textHelp', 'workHelp')
    @slot('autofocus', 'true')
    @slot('textDescription', 'Lugar dónde se llevarán a cabo los trabajos.')
    @component('components.input_select_option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($works as $work)
      @component('components.input_select_option')
        @slot('value')
          {{ $work->id }}
        @endslot
        @slot('selected')
          {{ old('work_id') == $work->id ? 'selected' : '' }}
        @endslot
        {{ $work->work_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- id field --}}
  @component('components.input_number')
    @slot('label', 'OT')
    @slot('fieldName', 'id')
    @slot('value', old('id'))
    @slot('textHelp', 'idHelp')
    @slot('textDescription', 'Número de órden de trabajo.')
  @endcomponent

  {{-- employee id field --}}
  @component('components.input_select')
    @slot('label', 'Personal')
    @slot('fieldName', 'employee_id')
    @slot('value', old('employee_id'))
    @slot('textHelp', 'employeeHelp')
    @slot('textDescription', 'Lugar dónde se llevarán a cabo los trabajos.')
    @component('components.input_select_option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($employees as $employee)
      @component('components.input_select_option')
        @slot('value')
          {{ $employee->id }}
        @endslot
        @slot('selected')
          {{ old('employee_id') == $employee->id ? 'selected' : '' }}
        @endslot
        {{ $employee->employee_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- work order date field --}}
  @component('components.input_date')
    @slot('label', 'Fecha')
    @slot('fieldName', 'work_order_date')
    @slot('value', old('work_order_date'))
    @slot('textHelp', 'dateHelp')
    @slot('textDescription', 'Fecha de toma de la muestra.')
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('work_orders.index'))
    {{ __('órdenes de trabajo') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('nueva') }}
  @endcomponent
@endsection
