@extends('layouts.index')

{{-- header --}}
@section('title', 'pendientes')

{{-- nav --}}
@section('navLinks')
  @component('components.navs.item')
    @slot('url')
      {{ route('samples.create') }}
    @endslot
    {{ __('nuevo') }}
  @endcomponent
  @component('components.navs.item')
    @slot('url')
      {{--{{ route('print.work_orders') }}--}}
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
      @slot('style', 'text-center th-w-sm')
      {{ __('#') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center text-uppercase th-w-sm')
      {{ __('ot') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-md')
      {{ __('recibido') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')
      {{ __('empleo') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center')
      {{ __('material') }}
    @endcomponent
    @component('components.tables.th')
      @slot('style', 'text-center th-w-sm')
      {{ __(' ') }}
    @endcomponent
  @endcomponent
@endsection

@section('tbody')
  @foreach ($samples as $sample)
    @component('components.tables.tr')
      @component('components.tables.td')
        @slot('style', 'text-center')
        {{ $sample->id }}
      @endcomponent
      @component('components.tables.td')
        {{ $sample->work_order_id }}
      @endcomponent
      @component('components.tables.td')
        {{ $sample->sample_receipt_date }}
      @endcomponent
      @component('components.tables.td')
        {{ $sample->purpose_name }}
      @endcomponent
      @component('components.tables.td')
        {{ $sample->sample_description }}
      @endcomponent
      @component('components.tables.td_detail')
        @slot('style', 'text-center')
        /samples/{{ $sample->id }}
      @endcomponent
    @endcomponent
  @endforeach
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ __('pendientes') }}
  @endcomponent
@endsection
