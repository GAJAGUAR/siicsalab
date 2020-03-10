@extends('layouts.edit')

{{-- header --}}
@section('title', 'editar personal')

{{-- nav --}}
@section('urlToClose', route('employees.index').'/'.$employee->id)
@section('urlToExit', route('employees.index'))

{{-- main --}}
@section('action', route('employees.index').'/'.$employee->id)
@section('formContent')
  @component('components.form_row')

    {{-- employee title field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Título')
      @slot('fieldName', 'employee_title')
      @slot('value', $employee->employee_title)
      @slot('maxLength', '5')
      @slot('autofocus', 'true')
      @slot('textDescription', 'Título académico.')
    @endcomponent

    {{-- first name 1 field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Primer nombre')
      @slot('fieldName', 'first_name_1')
      @slot('value', $employee->first_name_1)
      @slot('maxLength', '15')
      @slot('textDescription', 'Primer nombre.')
    @endcomponent

    {{-- first name 2 field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Segundo nombre')
      @slot('fieldName', 'first_name_2')
      @slot('value', $employee->first_name_2)
      @slot('maxLength', '15')
      @slot('textDescription', 'Si tiene un segundo nombre.')
    @endcomponent
  @endcomponent
  @component('components.form_row')

    {{-- last name 1 field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Apellido paterno')
      @slot('fieldName', 'last_name_1')
      @slot('value', $employee->last_name_1)
      @slot('maxLength', '15')
      @slot('textDescription', 'Apellido del padre.')
    @endcomponent

    {{-- last name 2 field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Apellido materno')
      @slot('fieldName', 'last_name_2')
      @slot('value', $employee->last_name_2)
      @slot('maxLength', '15')
      @slot('textDescription', 'Apellido de la madre.')
    @endcomponent

    {{-- employee nickname field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Alias')
      @slot('fieldName', 'employee_nickname')
      @slot('value', $employee->employee_nickname)
      @slot('maxLength', '50')
      @slot('textDescription', 'Usado para vistas compactas.')
    @endcomponent
  @endcomponent
  @component('components.form_row')

    {{-- position id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Puesto')
      @slot('fieldName', 'position_id')
      @slot('value', $employee->position_id)
      @slot('maxLength', '30')
      @slot('textDescription', 'Cargo de acuerdo al perfil de puesto.')
      @foreach ($positions as $position)
        @component('components.input_select_option')
          @slot('value', $position->id)
          @slot('selected')
            {{ $employee->position_id == $position->id ? 'selected' : '' }}
          @endslot
          {{ $position->position_name }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- schooling id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Escolaridad')
      @slot('fieldName', 'schooling_id')
      @slot('value', $employee->schooling_id)
      @slot('textDescription', 'Máximo grado de estudios alcanzado.')
      @foreach ($schoolings as $schooling)
        @component('components.input_select_option')
          @slot('value')
            {{ $schooling->id }}
          @endslot
          @slot('selected')
            {{ $employee->schooling_id === $schooling->id ? 'selected' : '' }}
          @endslot
          {{ $schooling->schooling_name }}
        @endcomponent
      @endforeach
    @endcomponent
  @endcomponent
  @component('components.form_row')

    {{-- employee birthdate field --}}
    @component('components.input_date')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Nacimiento')
      @slot('fieldName', 'employee_birthdate')
      @slot('value', $employee->employee_birthdate)
      @slot('textDescription', 'Fecha de cumpleaños.')
    @endcomponent

    {{-- employee gender field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Género')
      @slot('fieldName', 'employee_gender')
      @slot('value', $employee->employee_gender)
      @slot('textDescription', 'Únicamente para fines estadísticos.')
      @component('components.input_select_option')
        @slot('value')
        {{ __('0') }}
        @endslot
        @slot('selected')
          {{ $employee->employee_gender == 0 ? 'selected' : '' }}
        @endslot
        {{ __('MASCULINO') }}
      @endcomponent
      @component('components.input_select_option')
        @slot('value')
        {{ __('1') }}
        @endslot
        @slot('selected')
          {{ $employee->employee_gender == 1 ? 'selected' : '' }}
        @endslot
        {{ __('FEMENINO') }}
      @endcomponent
    @endcomponent
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('employees.index'))
    {{ __('personal') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('employees.index').'/'.$employee->id)
    {{ $employee->id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('editar') }}
  @endcomponent
@endsection
