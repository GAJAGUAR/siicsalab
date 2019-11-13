@extends('layouts.index')

{{-- header --}}
@section('title', 'obras')

{{-- nav --}}
@section('urlToNew', route('works.create'))
@section('urlToPrint', '#')

{{-- main --}}
@section('thead')
  @component('components.tables.tr')
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')
      {{ __('nombre') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __('ot') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection
@section('tbody')
  @foreach ($works as $work)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $loop->iteration }}
      @endcomponent
      @component('components.tables.td')
        {{ $work->work_name }}
      @endcomponent
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $work->work_orders }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('style', 'text-center')
        /works/{{ $work->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ __('obras') }}
  @endcomponent
@endsection
