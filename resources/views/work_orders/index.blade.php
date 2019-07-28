@extends('layouts.index')

{{-- header --}}
@section('title', 'órdenes de trabajo')

{{-- nav --}}
@section('navLinks')
  @component('components.navs.nav_link')
    @slot('url')
      {{ route('work_orders.create') }}
    @endslot

    {{ __('nueva') }}
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
        {{ __('text-center th-date') }}
      @endslot

      {{ __('fecha') }}
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

      {{ __('personal') }}
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
  @foreach ($workOrders as $workOrder)
    <tr>
      <td class="text-center">
        {{ $workOrder->id }}
      </td>

      <td>
        {{ $workOrder->work_order_date }}
      </td>

      <td>
        {{ $workOrder->work_name }}
      </td>

      <td>
        {{ $workOrder->employee_nickname }}
      </td>

      <td class="text-center">
        <a href="/work_orders/{{ $workOrder->id }}">
          <i class="fas fa-search"></i>
        </a>
      </td>

      <td class="text-center">
        <a href="/work_orders/{{ $workOrder->id }}/edit">
          <i class="fas fa-edit"></i>
        </a>
      </td>
    </tr>
  @endforeach
@endsection
