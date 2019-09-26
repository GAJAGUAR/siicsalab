@extends('layouts.edit')

@section('title', 'editar obra')
@section('formRoute', route('works.index').'/'.$work->id)
@section('closeUrl', route('works.index').'/'.$work->id)
@section('exitUrl', route('works.index'))
@section('formContent')

  {{-- client id flield --}}
  @component('components.inputs.select')
    @slot('label', 'Cliente')
    @slot('fieldName', 'client_id')
    @slot('textHelp', 'clientHelp')
    @slot('autofocus', 'true')
    @slot('textDescription', 'Encargado de llevar a cabo los trabajos.')
    @foreach ($clients as $client)
      @component('components.inputs.option')
        @slot('value')
          {{ $client->id }}
        @endslot
        @slot('selected')
          {{ $work->client_id == $client->id ? 'selected' : '' }}
        @endslot
        {{ $client->client_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- work name field --}}
  @component('components.inputs.textarea')
    @slot('label', 'Nombre')
    @slot('fieldName', 'work_name')
    @slot('value', $work->work_name)
    @slot('textHelp', 'nameHelp')
    @slot('maxLength', '750')
    @slot('textDescription', 'Nombre completo tal como aparecerá en los informes.')
  @endcomponent

  {{-- work nickname field --}}
  @component('components.inputs.text')
    @slot('style', '')
    @slot('label', 'Alias')
    @slot('fieldName', 'work_nickname')
    @slot('value', $work->work_nickname)
    @slot('textHelp', 'nicknameHelp')
    @slot('maxLength', '50')
    @slot('textDescription', 'Usado para vistas compactas.')
  @endcomponent

  {{-- work location field --}}
  @component('components.inputs.textarea')
    @slot('label', 'Ubicación')
    @slot('fieldName', 'work_location')
    @slot('value', $work->work_location)
    @slot('textHelp', 'locationHelp')
    @slot('maxLength', '250')
    @slot('textDescription', 'Calle, número, localidad, ciudad, estado, código postal.')
  @endcomponent
@endsection
