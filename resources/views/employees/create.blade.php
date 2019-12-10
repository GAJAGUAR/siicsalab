@extends('layouts.create')

{{-- header --}}
@section('title', 'nuevo personal')

{{-- nav --}}
@section('urlToExit', route('employees.index'))

{{-- main --}}
@section('action', route('employees.store'))
@section('formContent')
  @component('components.form_row')

    {{-- employee title field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Título')
      @slot('fieldName', 'employee_title')
      @slot('value', old('employee_title'))
      @slot('textHelp', 'titleHelp')
      @slot('maxLength', '5')
      @slot('autofocus', 'true')
      @slot('textDescription', 'Título académico.')
    @endcomponent

    {{-- first name 1 field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Primer nombre')
      @slot('fieldName', 'first_name_1')
      @slot('value', old('first_name_1'))
      @slot('textHelp', 'firstName1Help')
      @slot('maxLength', '15')
      @slot('textDescription', 'Primer nombre.')
    @endcomponent

    {{-- first name 2 field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Segundo nombre')
      @slot('fieldName', 'first_name_2')
      @slot('value', old('first_name_2'))
      @slot('textHelp', 'firstName2Help')
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
      @slot('value', old('last_name_1'))
      @slot('textHelp', 'lastName1Help')
      @slot('maxLength', '15')
      @slot('textDescription', 'Apellido del padre.')
    @endcomponent

    {{-- last name 2 field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Apellido materno')
      @slot('fieldName', 'last_name_2')
      @slot('value', old('last_name_2'))
      @slot('textHelp', 'lastName2Help')
      @slot('maxLength', '15')
      @slot('textDescription', 'Apellido de la madre.')
    @endcomponent

    {{-- employee nickname field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Alias')
      @slot('fieldName', 'employee_nickname')
      @slot('value', old('employee_nickname'))
      @slot('textHelp', 'nicknameHelp')
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
      @slot('value', old('position_id'))
      @slot('textHelp', 'positionHelp')
      @slot('maxLength', '30')
      @slot('textDescription', 'Cargo de acuerdo al perfil de puesto.')
      @component('components.input_select_option')
        @slot('value', '')
        {{ __('SELECCIONAR') }}
      @endcomponent
      @foreach ($positions as $position)
        @component('components.input_select_option')
          @slot('value', $position->id)
          @slot('selected')
            {{ old('position_id') == $position->id ? 'selected' : '' }}
          @endslot
          {{ $position->position_name }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- scholarship id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Escolaridad')
      @slot('fieldName', 'scholarship_id')
      @slot('value', old('scholarship_id'))
      @slot('textHelp', 'workOrderHelp')
      @slot('textDescription', 'Máximo grado de estudios alcanzado.')
      <option value="">SELECCIONAR</option>
      @foreach ($scholarships as $scholarship)
        @component('components.input_select_option')
          @slot('value')
            {{ $scholarship->id }}
          @endslot
          @slot('selected')
            {{ old('scholarship_id') == $scholarship->id ? 'selected' : '' }}
          @endslot
          {{ $scholarship->scholarship_name }}
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
      @slot('value', old('employee_birthdate'))
      @slot('textHelp', 'receiptHelp')
      @slot('textDescription', 'Fecha de cumpleaños.')
    @endcomponent

    {{-- employee gender field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Género')
      @slot('fieldName', 'employee_gender')
      @slot('value', old('employee_gender'))
      @slot('textHelp', 'weatherHelp')
      @slot('textDescription', 'Únicamente para fines estadísticos.')
      @component('components.input_select_option')
        @slot('value')
        {{ __('0') }}
        @endslot
        @slot('selected')
          {{ old('employee_gender') == 0 ? 'selected' : '' }}
        @endslot
        {{ __('MASCULINO') }}
      @endcomponent
      @component('components.input_select_option')
        @slot('value')
        {{ __('1') }}
        @endslot
        @slot('selected')
          {{ old('employee_gender') == 1 ? 'selected' : '' }}
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
    @slot('active', true)
    {{ __('nuevo') }}
  @endcomponent
@endsection
