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
  <tr>
    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('#') }}
    @endcomponent

    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('nombre') }}
    @endcomponent

    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('detalle') }}
    @endcomponent

    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('editar') }}
    @endcomponent
  </tr>
@endsection

@section('tbody')
  @foreach ($employees as $employee)
    <tr>
      <td class="text-center">
        {{ $loop->iteration }}
      </td>

      <td>
        {{ $employee->employee_name }}
      </td>

      <td class="text-center">
        <a href="/employees/{{ $employee->id }}">
          <i class="fas fa-search"></i>
        </a>
      </td>

      <td class="text-center">
        <a href="/employees/{{ $employee->id }}/edit">
          <i class="fas fa-edit"></i>
        </a>
      </td>
    </tr>
  @endforeach
@endsection
