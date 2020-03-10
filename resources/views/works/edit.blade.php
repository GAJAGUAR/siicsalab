@extends('layouts.edit')

{{-- header --}}
@section('title', 'editar obra')

{{-- nav --}}
@section('urlToClose', route('works.index').'/'.$work->id)
@section('urlToExit', route('works.index'))

{{-- main --}}
@section('action', route('works.index').'/'.$work->id)
@section('formContent')

  {{-- client id flield --}}
  @component('components.input_select')
    @slot('label', 'Cliente')
    @slot('fieldName', 'client_id')
    @slot('autofocus', 'true')
    @slot('textDescription', 'Encargado de llevar a cabo los trabajos.')
    @foreach ($clients as $client)
      @component('components.input_select_option')
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
  @component('components.input_textarea')
    @slot('label', 'Nombre')
    @slot('fieldName', 'work_name')
    @slot('value', $work->work_name)
    @slot('maxLength', '750')
    @slot('textDescription', 'Nombre completo tal como aparecerá en los informes.')
  @endcomponent

  {{-- work nickname field --}}
  @component('components.input_text')
    @slot('style', '')
    @slot('label', 'Alias')
    @slot('fieldName', 'work_nickname')
    @slot('value', $work->work_nickname)
    @slot('maxLength', '50')
    @slot('textDescription', 'Usado para vistas compactas.')
  @endcomponent

  {{-- work location field --}}
  @component('components.input_textarea')
    @slot('label', 'Ubicación')
    @slot('fieldName', 'work_location')
    @slot('value', $work->work_location)
    @slot('maxLength', '250')
    @slot('textDescription', 'Calle, número, localidad, ciudad, estado, código postal.')
  @endcomponent

  {{-- work notes field --}}
  @component('components.input_textarea')
    @slot('label', 'Notas')
    @slot('fieldName', 'work_notes')
    @slot('value', $work->work_notes)
    @slot('maxLength', '500')
    @slot('textDescription', 'Cualquier observación o comentario adicional.')
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index').'/'.$work->client_id)
    {{ $work->client_id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index').'/'.$work->id)
    {{ $work->id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('editar') }}
  @endcomponent
@endsection
