@extends('layouts.create')

{{-- header --}}
@section('title', 'nueva obra')

{{-- nav --}}
@section('urlToExit', route('works.index'))

{{-- main --}}
@section('action', route('works.store'))
@section('formContent')

  {{-- client id flield --}}
  @component('components.input_select')
    @slot('label', 'Cliente')
    @slot('fieldName', 'client_id')
    @slot('textHelp', 'clientHelp')
    @slot('autofocus', 'true')
    @slot('textDescription', 'Encargado de llevar a cabo los trabajos.')
    @component('components.input_select_option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($clients as $client)
      @component('components.input_select_option')
        @slot('value')
          {{ $client->id }}
        @endslot
        @slot('selected')
          {{ old('client_id') == $client->id ? 'selected' : '' }}
        @endslot
        {{ $client->client_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- work name field --}}
  @component('components.input_textarea')
    @slot('label', 'Nombre')
    @slot('fieldName', 'work_name')
    @slot('value', old('work_name'))
    @slot('textHelp', 'nameHelp')
    @slot('maxLength', '750')
    @slot('textDescription', 'Nombre completo tal como aparecerá en los informes.')
  @endcomponent

  {{-- work nickname field --}}
  @component('components.input_text')
    @slot('style', '')
    @slot('label', 'Alias')
    @slot('fieldName', 'work_nickname')
    @slot('value', old('work_nickname'))
    @slot('textHelp', 'nicknameHelp')
    @slot('maxLength', '50')
    @slot('textDescription', 'Usado para vistas compactas.')
  @endcomponent

  {{-- work location field --}}
  @component('components.input_textarea')
    @slot('label', 'Ubicación')
    @slot('fieldName', 'work_location')
    @slot('value', old('work_location'))
    @slot('textHelp', 'locationHelp')
    @slot('maxLength', '250')
    @slot('textDescription', 'Calle, número, localidad, ciudad, estado, código postal.')
  @endcomponent

  {{-- work notes field --}}
  @component('components.input_textarea')
    @slot('label', 'Notas')
    @slot('fieldName', 'work_notes')
    @slot('value', old('work_notes'))
    @slot('textHelp', 'notesHelp')
    @slot('maxLength', '500')
    @slot('textDescription', 'Cualquier observación o comentario adicional.')
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('nueva') }}
  @endcomponent
@endsection
