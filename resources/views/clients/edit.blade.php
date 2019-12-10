@extends('layouts.edit')

{{-- header --}}
@section('title', 'editar cliente')

{{-- nav --}}
@section('urlToClose', route('clients.index').'/'.$client->id)
@section('urlToExit', route('clients.index'))

{{-- main --}}
@section('action', route('clients.index').'/'.$client->id)
@section('formContent')

  {{-- client name field --}}
  @component('components.input_textarea')
    @slot('label', 'Razón Social')
    @slot('fieldName', 'client_name')
    @slot('value', $client->client_name))
    @slot('textHelp', 'nameHelp')
    @slot('maxLength', '150')
    @slot('autofocus', 'true')
    @slot('textDescription', 'Nombre completo tal como aparecerá en los informes.')
  @endcomponent

  {{-- client nickname field --}}
  @component('components.input_text')
    @slot('style', '')
    @slot('label', 'Alias')
    @slot('fieldName', 'client_nickname')
    @slot('value', $client->client_nickname))
    @slot('textHelp', 'nicknameHelp')
    @slot('maxLength', '50')
    @slot('textDescription', 'Usado para vistas compactas.')
  @endcomponent

  {{-- register field --}}
  @component('components.input_text')
    @slot('style', '')
    @slot('label', 'RFC')
    @slot('fieldName', 'client_register')
    @slot('value', $client->client_register))
    @slot('textHelp', 'registerHelp')
    @slot('maxLength', '25')
    @slot('textDescription', 'Clave del registro federal de contribuyentes.')
  @endcomponent

  {{-- client location field --}}
  @component('components.input_textarea')
    @slot('label', 'Domicilio Fiscal')
    @slot('fieldName', 'client_location')
    @slot('value', $client->client_location))
    @slot('textHelp', 'locationHelp')
    @slot('maxLength', '250')
    @slot('textDescription', 'Calle, número, localidad, ciudad, estado, código postal.')
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index').'/'.$client->id)
    {{ $client->id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('editar') }}
  @endcomponent
@endsection
