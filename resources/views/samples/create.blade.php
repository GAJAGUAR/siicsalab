@extends('layouts.create')

@section('title', 'nuevo ensaye')
@section('action', route('samples.store'))
@section('urlToExit', route('samples.index'))
@section('formContent')
  @component('components.inputs.form_row')

    {{-- work order id field --}}
    @component('components.inputs.select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Orden de trabajo')
      @slot('fieldName', 'work_order_id')
      @slot('value', old('work_order_id'))
      @slot('textHelp', 'workOrderHelp')
      @slot('autofocus', 'true')
      @slot('textDescription', 'Orden de trabajo a la que pertenece el ensaye.')
      @component('components.inputs.option')
        @slot('value', '')
        {{ __('SELECCIONAR') }}
      @endcomponent
      @foreach ($workOrders as $workOrder)
        @component('components.inputs.option')
          @slot('value')
            {{ $workOrder->id }}
          @endslot
          @slot('selected')
            {{ old('work_order_id') == $workOrder->id ? 'selected' : '' }}
          @endslot
          {{ $workOrder->id }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- id field --}}
    @component('components.inputs.number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Ensaye')
      @slot('fieldName', 'id')
      @slot('value', old('id'))
      @slot('textHelp', 'idHelp')
      @slot('textDescription', 'Número de ensaye.')
    @endcomponent

    {{-- sample time field --}}
    @component('components.inputs.time')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Hora')
      @slot('fieldName', 'sample_time')
      @slot('value', old('sample_time'))
      @slot('textHelp', 'timeHelp')
      @slot('textDescription', 'Hora en la que se tomó la muestra.')
    @endcomponent
  @endcomponent

  {{-- sample description field --}}
  @component('components.inputs.list')
    @slot('label', 'Descripción')
    @slot('fieldName', 'sample_description')
    @slot('value', old('sample_description'))
    @slot('textHelp', 'descriptionHelp')
    @slot('maxLength', '250')
    @slot('textDescription', 'Información petrográfica del material.')
  @endcomponent
  @component('components.inputs.datalist')
    @slot('fieldName', 'sample_description')
    @foreach ($descriptions as $description)
      @component('components.inputs.option')
        @slot('value')
          {{ $description->sample_description }}
        @endslot
        {{ $description->sample_description }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample treatment field --}}
  @component('components.inputs.list')
    @slot('label', 'Tratamiento')
    @slot('fieldName', 'sample_treatment')
    @slot('value', old('sample_treatment'))
    @slot('textHelp', 'treatmentHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Realizado sobre el material, previo al muestreo.')
  @endcomponent
  @component('components.inputs.datalist')
    @slot('fieldName', 'sample_treatment')
    @foreach ($treatments as $treatment)
      @component('components.inputs.option')
        @slot('value')
          {{ $treatment->sample_treatment }}
        @endslot
        {{ $treatment->sample_treatment }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample location field --}}
  @component('components.inputs.list')
    @slot('label', 'Localización')
    @slot('fieldName', 'sample_location')
    @slot('value', old('sample_location'))
    @slot('textHelp', 'locationHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Ubicación general de la muestra.')
  @endcomponent
  @component('components.inputs.datalist')
    @slot('fieldName', 'sample_location')
    @foreach ($locations as $location)
      @component('components.inputs.option')
        @slot('value')
          {{ $location->sample_location }}
        @endslot
        {{ $location->sample_location }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample road name field --}}
  @component('components.inputs.list')
    @slot('label', 'Camino')
    @slot('fieldName', 'sample_road_name')
    @slot('value', old('sample_road_name'))
    @slot('textHelp', 'roadNameHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Anotarlo si la muestra fue tomada en un camino o vía.')
  @endcomponent
  @component('components.inputs.datalist')
    @slot('fieldName', 'sample_road_name')
    @foreach ($roadNames as $roadName)
      @component('components.inputs.option')
        @slot('value')
          {{ $roadName->sample_road_name }}
        @endslot
        {{ $roadName->sample_road_name }}
      @endcomponent
    @endforeach
  @endcomponent
  @component('components.inputs.form_row')

    {{-- sample road station start field --}}
    @component('components.inputs.text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento inicio')
      @slot('fieldName', 'sample_road_station_start')
      @slot('value', old('sample_road_station_start'))
      @slot('textHelp', 'roadStartHelp')
      @slot('maxLength', '11')
      @slot('textDescription', 'Inicio del tramo que representa la muestra.')
    @endcomponent

    {{-- sample road station end field --}}
    @component('components.inputs.text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento fin')
      @slot('fieldName', 'sample_road_station_end')
      @slot('value', old('sample_road_station_end'))
      @slot('textHelp', 'roadEndHelp')
      @slot('maxLength', '11')
      @slot('textDescription', 'Fin del tramo que representa la muestra.')
    @endcomponent

    {{-- sample road station field --}}
    @component('components.inputs.text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento muestra')
      @slot('fieldName', 'sample_road_station')
      @slot('value', old('sample_road_station'))
      @slot('textHelp', 'roadStationHelp')
      @slot('maxLength', '11')
      @slot('textDescription', 'Kilometraje exacto donde se tomó la muestra.')
    @endcomponent
  @endcomponent
  @component('components.inputs.form_row')

    {{-- sample road body field --}}
    @component('components.inputs.list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cuerpo')
      @slot('fieldName', 'sample_road_body')
      @slot('value', old('sample_road_body'))
      @slot('textHelp', 'bodyHelp')
      @slot('maxLength', '20')
      @slot('textDescription', 'Designación del cuerpo del camino.')
    @endcomponent
    @component('components.inputs.datalist')
      @slot('fieldName', 'sample_road_body')
      @foreach ($roadBodies as $roadBody)
        @component('components.inputs.option')
          @slot('value')
            {{ $roadBody->sample_road_body }}
          @endslot
          {{ $roadBody->sample_road_body }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample road side field --}}
    @component('components.inputs.list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Lado')
      @slot('fieldName', 'sample_road_side')
      @slot('value', old('sample_road_side'))
      @slot('textHelp', 'sideHelp')
      @slot('maxLength', '10')
      @slot('textDescription', 'Lado o desviación del camino.')
    @endcomponent
    @component('components.inputs.datalist')
      @slot('fieldName', 'sample_road_side')
      @foreach ($roadSides as $roadSide)
        @component('components.inputs.option')
          @slot('value')
            {{ $roadSide->sample_road_side }}
          @endslot
          {{ $roadSide->sample_road_side }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample road stripe field --}}
    @component('components.inputs.list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Franja')
      @slot('fieldName', 'sample_road_stripe')
      @slot('value', old('sample_road_stripe'))
      @slot('textHelp', 'stripeHelp')
      @slot('maxLength', '10')
      @slot('textDescription', 'Sección longitudinal.')
    @endcomponent
    @component('components.inputs.datalist')
      @slot('fieldName', 'sample_road_stripe')
      @foreach ($roadStripes as $roadStripe)
        @component('components.inputs.option')
          @slot('value')
            {{ $roadStripe->sample_road_stripe }}
          @endslot
          {{ $roadStripe->sample_road_stripe }}
        @endcomponent
      @endforeach
    @endcomponent
  @endcomponent

  {{-- bank id field --}}
  @component('components.inputs.select')
    @slot('label', 'Banco')
    @slot('fieldName', 'bank_id')
    @slot('value', old('bank_id'))
    @slot('textHelp', 'bankHelp')
    @slot('textDescription', 'Banco de donde procede el material.')
    @component('components.inputs.option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($banks as $bank)
      @component('components.inputs.option')
        @slot('value')
          {{ $bank->id }}
        @endslot
        @slot('selected')
          {{ old('bank_id') == $bank->id ? 'selected' : '' }}
        @endslot
        {{ $bank->bank_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample purpose id field --}}
  @component('components.inputs.select')
    @slot('label', 'Para utilizar en')
    @slot('fieldName', 'sample_purpose_id')
    @slot('value', old('sample_purpose_id'))
    @slot('textHelp', 'purposeHelp')
    @slot('textDescription', 'Empleo que se le dará al material.')
    @component('components.inputs.option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($purposes as $purpose)
      @component('components.inputs.option')
        @slot('value')
          {{ $purpose->id }}
        @endslot
        @slot('selected')
          {{ old('sample_purpose_id') == $purpose->id ? 'selected' : '' }}
        @endslot
        {{ $purpose->sample_purpose_name }}
      @endcomponent
    @endforeach
  @endcomponent
  @component('components.inputs.form_row')

    {{-- sample phreatic level field --}}
    @component('components.inputs.number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'N. A. F.')
      @slot('fieldName', 'sample_phreatic_level')
      @slot('value', old('sample_phreatic_level'))
      @slot('textHelp', 'phreaticHelp')
      @slot('textDescription', 'Nivel freático.')
    @endcomponent

    {{-- sampling seq field --}}
    @component('components.inputs.number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Muestreo')
      @slot('fieldName', 'sampling_seq')
      @slot('value', old('sampling_seq'))
      @slot('textHelp', 'samplingHelp')
      @slot('textDescription', 'Número de muestreo.')
    @endcomponent

    {{-- sample seq field --}}
    @component('components.inputs.number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Muestra')
      @slot('fieldName', 'sample_seq')
      @slot('value', old('sample_seq'))
      @slot('textHelp', 'sampleHelp')
      @slot('textDescription', 'Número de muestra.')
    @endcomponent

    {{-- sampling env temp field --}}
    @component('components.inputs.number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Temperatura')
      @slot('fieldName', 'sampling_env_temp')
      @slot('value', old('sampling_env_temp'))
      @slot('textHelp', 'temperatureHelp')
      @slot('textDescription', 'Temperatura ambiente.')
    @endcomponent
  @endcomponent

  {{-- sample weather id field --}}
  @component('components.inputs.select')
    @slot('label', 'Clima')
    @slot('fieldName', 'sample_weather_id')
    @slot('value', old('sample_weather_id'))
    @slot('textHelp', 'weatherHelp')
    @slot('textDescription', 'Condiciones climáticas al momento de tomar la muestra.')
    @component('components.inputs.option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($weathers as $weather)
      @component('components.inputs.option')
        @slot('value')
          {{ $weather->id }}
        @endslot
        @slot('selected')
          {{ old('sample_weather_id') == $weather->id ? 'selected' : '' }}
        @endslot
        {{ $weather->sample_weather_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample tests field --}}
  @component('components.inputs.text')
    @slot('label', 'Pruebas')
    @slot('fieldName', 'sample_tests')
    @slot('value', old('sample_tests'))
    @slot('textHelp', 'testsHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Estudios que se ralizarán al material.')
  @endcomponent

  {{-- sammple notes field --}}
  @component('components.inputs.textarea')
    @slot('label', 'Notas')
    @slot('fieldName', 'sample_notes')
    @slot('value', old('sample_notes'))
    @slot('textHelp', 'notesHelp')
    @slot('maxLength', '500')
    @slot('textDescription', 'Cualquier observación o comentario adicional.')
  @endcomponent
  @component('components.inputs.form_row')

    {{-- sample receipt date field --}}
    @component('components.inputs.date')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Recibido')
      @slot('fieldName', 'sample_receipt_date')
      @slot('value', old('sample_receipt_date'))
      @slot('textHelp', 'receiptHelp')
      @slot('textDescription', 'Fecha de recibido en el laboratorio.')
    @endcomponent

    {{-- sample priority id field --}}
    @component('components.inputs.select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Prioridad')
      @slot('fieldName', 'sample_priority_id')
      @slot('value', old('sample_priority_id'))
      @slot('textHelp', 'priorityHelp')
      @slot('textDescription', 'Relevancia con respecto de los demás trabajos.')
      @component('components.inputs.option')
        @slot('value', '')
        {{ __('SELECCIONAR') }}
      @endcomponent
      @foreach ($priorities as $priority)
        @component('components.inputs.option')
          @slot('value')
            {{ $priority->id }}
          @endslot
          @slot('selected')
            {{ old('sample_priority_id') == $priority->id ? 'selected' : '' }}
          @endslot
          {{ $priority->sample_priority_name }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample status id field --}}
    @component('components.inputs.select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Estado')
      @slot('fieldName', 'sample_status_id')
      @slot('value', old('sample_status_id'))
      @slot('textHelp', 'statusHelp')
      @slot('textDescription', 'Empleo que se le dará al material.')
      @component('components.inputs.option')
        @slot('value', '')
        {{ __('SELECCIONAR') }}
      @endcomponent
      @foreach ($statuses as $status)
        @component('components.inputs.option')
          @slot('value')
            {{ $status->id }}
          @endslot
          @slot('selected')
            {{ old('sample_status_id') == $status->id ? 'selected' : '' }}
          @endslot
          {{ $status->sample_status_name }}
        @endcomponent
      @endforeach
    @endcomponent
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumbs.item')
    @slot('url', route('samples.index'))
    {{ __('ensayes') }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ __('nuevo') }}
  @endcomponent
@endsection
