@extends('layouts.index')

{{-- header --}}
@section('title', 'obras')

{{-- nav --}}
@section('navLinks')
  @component('components.navs.nav_link')
    @slot('url')
      {{ route('works.create') }}
    @endslot

    {{ __('nueva') }}
  @endcomponent

  @component('components.navs.nav_link')
    @slot('url')
      {{--{{ route('print.works') }}--}}
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
  @foreach ($works as $work)
    <tr>
      <td class="text-center">
        {{ $loop->iteration }}
      </td>

      <td>
        {{ $work->work_name }}
      </td>

      <td class="text-center">
        <a href="/works/{{ $work->id }}">
          <i class="fas fa-search"></i>
        </a>
      </td>

      <td class="text-center">
        <a href="/works/{{ $work->id }}/edit">
          <i class="fas fa-edit"></i>
        </a>
      </td>
    </tr>
  @endforeach
@endsection
