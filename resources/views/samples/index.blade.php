@extends('layouts.index')

{{-- header --}}
@section('title', 'ensayes')

{{-- nav --}}
@section('navLinks')
  @component('components.navs.nav_link')
    @slot('url')
      {{ route('samples.create') }}
    @endslot

    {{ __('nuevo') }}
  @endcomponent

  @component('components.navs.nav_link')
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
  <tr>
    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('#') }}
    @endcomponent

    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center text-uppercase') }}
      @endslot

      {{ __('ot') }}
    @endcomponent

    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('obra') }}
    @endcomponent

    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('material') }}
    @endcomponent

    @component('components.tables.th')
      @slot('textAlign')
        {{ __('text-center') }}
      @endslot

      {{ __('empleo') }}
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
  @foreach ($samples as $sample)
    <tr>
      <td class="text-center">
        {{ $sample->id }}
      </td>

      <td>
        {{ $sample->work_order_id }}
      </td>

      <td>
        {{ $sample->work_nickname }}
      </td>

      <td>
        {{ $sample->sample_description }}
      </td>

      <td>
        {{ $sample->purpose_name }}
      </td>

      <td class="text-center">
        <a href="/samples/{{ $sample->id }}">
          <i class="fas fa-search"></i>
        </a>
      </td>

      <td class="text-center">
        <a href="/samples/{{ $sample->id }}/edit">
          <i class="fas fa-edit"></i>
        </a>
      </td>
    </tr>
  @endforeach
@endsection
