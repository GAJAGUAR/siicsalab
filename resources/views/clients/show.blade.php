@extends('layouts.show')

{{-- header --}}
@section('title')
  {{ $client->client_nickname }}
@endsection

{{-- nav --}}
@section('urlEdit')
  {{ $client->id }}/edit
@endsection

@section('urlAdd')
  {{-- route('works.create') --}}
@endsection

@section('textAdd')
  {{ __('Agregar obra') }}
@endsection

{{-- main --}}
@section('detail')
  @component('components.lists.term')
    {{ __('Razón social:') }}
  @endcomponent

  @component('components.lists.description')
    {{ $client->client_name }}
  @endcomponent

  @component('components.lists.term')
    {{ __('R.F.C.:') }}
  @endcomponent

  @component('components.lists.description')
    {{ $client->client_register }}
  @endcomponent

  @component('components.lists.term')
    {{ __('Domicilio fiscal:') }}
  @endcomponent

  @component('components.lists.description')
    {{ $client->client_location }}
  @endcomponent
@endsection

@section('subtitle')
  {{ __('obras:') }}
@endsection

@section('thead')
  <tr>
    @component('components.tables.th')
      {{ __('#') }}
    @endcomponent

    @component('components.tables.th')
      {{ __('Nombre') }}
    @endcomponent
  </tr>
@endsection

@section('tbody')
  @foreach ($works as $work)
    <tr>
      <td class="text-center">
        {{ $loop->iteration }}
      </td>

      <td>
        {{ $work->work_name }}
      </td>
    </tr>
  @endforeach
@endsection
