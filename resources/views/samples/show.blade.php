@extends('layouts.show')

{{-- header --}}
@section('title', 'Ensaye '.$sample->id)

{{-- nav --}}
@section('urlToEdit', $sample->id.'/edit')

{{-- main --}}
@section('detail')
  @component('components.definition_term')
    {{ __('Órden de trabajo:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->work_order_id }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Fecha de muestreo:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->work_order_date }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Fecha de recepción:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_receipt_date }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Hora de muestreo:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_time }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Cliente:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->client_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Obra:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->work_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Localización:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->work_location }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Personal:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->employee_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Descripción:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_description }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Tratamiento:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_treatment }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Tomada en:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_location }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Camino:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_road }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Banco de materiales:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->bank_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Localización del banco:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->bank_location }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Empleo:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_purpose_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Nivel freático:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_phreatic_level }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Sondeo:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sampling_seq }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Muestra:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_seq }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Temperatura ambiente:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sampling_env_temp }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Condiciones climáticas:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_weather_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Pruebas a realizar:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_tests }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Observaciones:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_notes }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Prioridad:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_priority_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('Estado:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_status_name }}
  @endcomponent
  @component('components.definition_term')
    {{ __('URL:') }}
  @endcomponent
  @component('components.definition_description')
    {{ $sample->sample_url }}
  @endcomponent
@endsection

@section('tbody', 'empty')

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index').'/'.$sample->client_id)
    {{ $sample->client_id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumb_item')
  @slot('url', route('works.index').'/'.$sample->work_id)
    {{ $sample->work_id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('work_orders.index'))
    {{ __('órdenes de trabajo') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('work_orders.index').'/'.$sample->work_order_id)
    {{ $sample->work_order_id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('samples.index'))
    {{ __('ensayes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ $sample->id }}
  @endcomponent
@endsection
