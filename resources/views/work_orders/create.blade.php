@extends('layouts.create')

@section('title', 'nueva orden de trabajo')

@section('formRoute', route('work_orders.store'))

@section('indexRoute', route('work_orders.index'))

@section('formContent')
  {{-- work id flield --}}
  @component('components.inputs.select')
    @slot('label', 'Obra')

    @slot('fieldName', 'work_id')

    @slot('value', old('work_id'))

    @slot('textHelp', 'workHelp')

    @slot('textDescription', 'Lugar dónde se llevarán a cabo los trabajos.')

    <option>Seleccionar</option>
    @foreach ($works as $work)
      @component('components.inputs.option')
        @slot('value')
          {{ $work->id }}
        @endslot

        @slot('selected')
          {{ (old('work_id') == $work->id ? 'selected' : '') }}
        @endslot

        {{ $work->work_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- id field --}}
  @component('components.inputs.number')
    @slot('label', 'OT')

    @slot('fieldName', 'id')

    @slot('value', old('id'))

    @slot('textHelp', 'idHelp')

    @slot('textDescription', 'Número de órden de trabajo.')
  @endcomponent

  {{-- employee id field --}}
  @component('components.inputs.select')
    @slot('label', 'Personal')

    @slot('fieldName', 'employee_id')

    @slot('value', old('employee_id'))

    @slot('textHelp', 'workHelp')

    @slot('textDescription', 'Lugar dónde se llevarán a cabo los trabajos.')

    <option>Seleccionar</option>
    @foreach ($employees as $employee)
      @component('components.inputs.option')
        @slot('value')
          {{ $employee->id }}
        @endslot

        @slot('selected')
          {{ (old('employee_id') == $employee->id ? 'selected' : '') }}
        @endslot

        {{ $employee->employee_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- work order date field --}}
  @component('components.inputs.date')
    @slot('label', 'Fecha')

    @slot('fieldName', 'work_order_date')

    @slot('value', old('work_order_date'))

    @slot('textHelp', 'dateHelp')

    @slot('textDescription', 'Fecha de toma de la muestra.')
  @endcomponent
@endsection
