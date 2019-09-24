@extends('layouts.index')

{{-- header --}}
@section('title', 'personal')

{{-- nav --}}
@section('navLinks')
  @component('components.navs.nav_link')
    @slot('url')
      {{ route('employees.create') }}
    @endslot
    {{ __('nuevo') }}
  @endcomponent
  @component('components.navs.nav_link')
    @slot('url')
      {{--{{ route('print.employees') }}--}}
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
      @slot('class', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.tables.th')
      @slot('class', 'text-center')
      {{ __('nombre') }}
    @endcomponent
    @component('components.tables.th')
      @slot('class', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($employees as $employee)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('class', 'text-center')
        {{ $loop->iteration }}
      @endcomponent
      @component('components.tables.td')
        {{ $employee->employee_name }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('class', 'text-center')
        /employees/{{ $employee->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection
