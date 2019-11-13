@extends('layouts.index')

{{-- header --}}
@section('title', 'personal')

{{-- nav --}}
@section('urlToNew', route('employees.create'))
@section('urlToPrint', '#')

{{-- main --}}
@section('thead')
  @component('components.tables.tr')
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')
      {{ __('nombre') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('ot') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($employees as $employee)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $loop->iteration }}
      @endcomponent
      @component('components.tables.td')
        {{ $employee->employee_name }}
      @endcomponent
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $employee->work_orders }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('style', 'text-center')
        /employees/{{ $employee->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ __('personal') }}
  @endcomponent
@endsection
