@extends('layouts.edit')

@section('title', 'editar cliente')
@section('formRoute', route('clients.index').'/'.$client->id)
@section('indexRoute', route('clients.index'))
@section('formContent')

  {{-- client name field --}}
  @component('components.inputs.textarea')
    @slot('label', 'Razón Social')
    @slot('fieldName', 'client_name')
    @slot('value', $client->client_name))
    @slot('textHelp', 'nameHelp')
    @slot('maxLength', '150')
    @slot('textDescription', 'Nombre completo tal como aparecerá en los informes.')
  @endcomponent

  {{-- client nickname field --}}
  @component('components.inputs.text')
    @slot('style', '')
    @slot('label', 'Alias')
    @slot('fieldName', 'client_nickname')
    @slot('value', $client->client_nickname))
    @slot('textHelp', 'nicknameHelp')
    @slot('maxLength', '50')
    @slot('textDescription', 'Usado para vistas compactas.')
  @endcomponent

  {{-- register field --}}
  @component('components.inputs.text')
    @slot('style', '')
    @slot('label', 'RFC')
    @slot('fieldName', 'client_register')
    @slot('value', $client->client_register))
    @slot('textHelp', 'registerHelp')
    @slot('maxLength', '25')
    @slot('textDescription', 'Clave del registro federal de contribuyentes.')
  @endcomponent

  {{-- client location field --}}
  @component('components.inputs.textarea')
    @slot('label', 'Domicilio Fiscal')
    @slot('fieldName', 'client_location')
    @slot('value', $client->client_location))
    @slot('textHelp', 'locationHelp')
    @slot('maxLength', '250')
    @slot('textDescription', 'Calle, número, localidad, ciudad, estado, código postal.')
  @endcomponent
@endsection
