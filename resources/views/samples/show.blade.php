@extends('layouts.show')

{{-- header --}}
@section('title')
  Ensaye {{ $sample->id }}
@endsection

{{-- nav --}}
@section('urlEdit')
  {{ $sample->id }}/edit
@endsection

{{-- main --}}
@section('detail')
  @component('components.lists.term')
    {{ __('Órden de trabajo:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->work_order_id }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Fecha de muestreo:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->work_order_date }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Fecha de recepción:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_receipt_date }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Hora de muestreo:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_time }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Cliente:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->client_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Obra:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->work_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Localización:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->work_location }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Descripción:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_description }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Tratamiento:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_treatment }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Tomada en:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_location }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Camino:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->road }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Banco de materiales:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->bank_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Localización del banco:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->bank_location }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Empleo:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->purpose_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Nivel freático:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->phreatic_level }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Sondeo:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sampling_seq }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Muestra:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_seq }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Temperatura ambiente:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->env_temp }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Condiciones climáticas:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->weather_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Pruebas a realizar:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_tests }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Observaciones:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->sample_notes }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Prioridad:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->priority_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('Estado:') }}
  @endcomponent
  @component('components.lists.description')
    {{ $sample->status_name }}
  @endcomponent
  @component('components.lists.term')
    {{ __('URL:') }}
  @endcomponent
  @component('components.lists.description')
    <a href="{{ asset('storage').'/'.$sample->sample_url.'.pdf' }}"
       target="_blank">{{ $sample->sample_url }}
    </a>
  @endcomponent
@endsection
