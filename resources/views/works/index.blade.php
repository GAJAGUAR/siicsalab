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
  @component('components.tables.tr')
    @component('components.tables.th')
      @slot('class', 'text-center')

      {{ __('#') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center')

      {{ __('nombre') }}
    @endcomponent

    @component('components.tables.th')
      @slot('class', 'text-center')

      {{ __('detalle') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($works as $work)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('class', 'text-center')

        {{ $loop->iteration }}
      @endcomponent

      @component('components.tables.td')
        {{ $work->work_name }}
      @endcomponent

      @component('components.tables.td_detail')
        @slot('class', 'text-center')

        /works/{{ $work->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection
