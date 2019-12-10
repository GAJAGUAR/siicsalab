@extends('layouts.edit')

{{-- header --}}
@section('title', 'editar ensaye')

{{-- nav --}}
@section('urlToClose', route('samples.index').'/'.$sample->id)
@section('urlToExit', route('samples.index'))

{{-- main --}}
@section('action', route('samples.index').'/'.$sample->id)
@section('formContent')
  @component('components.form_row')

    {{-- work order id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Orden de trabajo')
      @slot('fieldName', 'work_order_id')
      @slot('textHelp', 'workOrderHelp')
      @slot('autofocus', 'true')
      @slot('textDescription', 'Orden de trabajo a la que pertenece el ensaye.')
      @foreach ($workOrders as $workOrder)
        @component('components.input_select_option')
          @slot('value')
            {{ $workOrder->id }}
          @endslot
          @slot('selected')
            {{ $sample->work_order_id == $workOrder->id ? 'selected' : '' }}
          @endslot
          {{ $workOrder->id }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- id field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Ensaye')
      @slot('fieldName', 'id')
      @slot('value', $sample->id)
      @slot('textHelp', 'idHelp')
      @slot('textDescription', 'Número de ensaye.')
    @endcomponent

    {{-- sample time field --}}
    @component('components.input_time')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Hora')
      @slot('fieldName', 'sample_time')
      @slot('value', $sample->sample_time)
      @slot('textHelp', 'timeHelp')
      @slot('textDescription', 'Hora en la que se tomó la muestra.')
    @endcomponent
  @endcomponent

  {{-- sample description field --}}
  @component('components.input_list')
    @slot('label', 'Descripción')
    @slot('fieldName', 'sample_description')
    @slot('value', $sample->sample_description)
    @slot('textHelp', 'descriptionHelp')
    @slot('maxLength', '250')
    @slot('textDescription', 'Información petrográfica del material.')
  @endcomponent
  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_description')
    @foreach ($descriptions as $description)
      @component('components.input_select_option')
        @slot('value')
          {{ $description->sample_description }}
        @endslot
        {{ $description->sample_description }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample treatment field --}}
  @component('components.input_list')
    @slot('label', 'Tratamiento')
    @slot('fieldName', 'sample_treatment')
    @slot('value', $sample->sample_treatment)
    @slot('textHelp', 'treatmentHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Realizado sobre el material, previo al muestreo.')
  @endcomponent

  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_treatment')
    @foreach ($treatments as $treatment)
      @component('components.input_select_option')
        @slot('value')
          {{ $treatment->sample_treatment }}
        @endslot
        {{ $treatment->sample_treatment }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample location field --}}
  @component('components.input_list')
    @slot('label', 'Localización')
    @slot('fieldName', 'sample_location')
    @slot('value', $sample->sample_location)
    @slot('textHelp', 'locationHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Ubicación general de la muestra.')
  @endcomponent
  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_location')
    @foreach ($locations as $location)
      @component('components.input_select_option')
        @slot('value')
          {{ $location->sample_location }}
        @endslot
        {{ $location->sample_location }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample road name field --}}
  @component('components.input_list')
    @slot('label', 'Camino')
    @slot('fieldName', 'sample_road_name')
    @slot('value', $sample->sample_road_name)
    @slot('textHelp', 'roadNameHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Anotarlo si la muestra fue tomada en un camino o vía.')
  @endcomponent
  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_road_name')
    @foreach ($roadNames as $roadName)
      @component('components.input_select_option')
        @slot('value')
          {{ $roadName->sample_road_name }}
        @endslot
        {{ $roadName->sample_road_name }}
      @endcomponent
    @endforeach
  @endcomponent
  @component('components.form_row')

    {{-- sample road station start field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento inicio')
      @slot('fieldName', 'sample_road_station_start')
      @slot('value', $sample->sample_road_station_start)
      @slot('textHelp', 'roadStartHelp')
      @slot('maxLength', '11')
      @slot('textDescription', 'Inicio del tramo que representa la muestra.')
    @endcomponent

    {{-- sample road station end field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento fin')
      @slot('fieldName', 'sample_road_station_end')
      @slot('value', $sample->sample_road_station_end)
      @slot('textHelp', 'roadEndHelp')
      @slot('maxLength', '11')
      @slot('textDescription', 'Fin del tramo que representa la muestra.')
    @endcomponent

    {{-- sample road station field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento muestra')
      @slot('fieldName', 'sample_road_station')
      @slot('value', $sample->sample_road_station)
      @slot('textHelp', 'roadStationHelp')
      @slot('maxLength', '11')
      @slot('textDescription', 'Kilometraje exacto donde se tomó la muestra.')
    @endcomponent
  @endcomponent

  @component('components.form_row')

    {{-- sample road body field --}}
    @component('components.input_list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cuerpo')
      @slot('fieldName', 'sample_road_body')
      @slot('value', $sample->sample_road_body)
      @slot('textHelp', 'bodyHelp')
      @slot('maxLength', '20')
      @slot('textDescription', 'Designación del cuerpo del camino.')
    @endcomponent
    @component('components.input_text_datalist')
      @slot('fieldName', 'sample_road_body')
      @foreach ($roadBodies as $roadBody)
        @component('components.input_select_option')
          @slot('value')
            {{ $roadBody->sample_road_body }}
          @endslot
          {{ $roadBody->sample_road_body }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample road side field --}}
    @component('components.input_list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Lado')
      @slot('fieldName', 'sample_road_side')
      @slot('value', $sample->sample_road_side)
      @slot('textHelp', 'sideHelp')
      @slot('maxLength', '20')
      @slot('textDescription', 'Lado o desviación del camino.')
    @endcomponent
    @component('components.input_text_datalist')
      @slot('fieldName', 'sample_road_side')
      @foreach ($roadSides as $roadSide)
        @component('components.input_select_option')
          @slot('value')
            {{ $roadSide->sample_road_side }}
          @endslot
          {{ $roadSide->sample_road_side }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample road stripe field --}}
    @component('components.input_list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Franja')
      @slot('fieldName', 'sample_road_stripe')
      @slot('value', $sample->sample_road_stripe)
      @slot('textHelp', 'stripeHelp')
      @slot('maxLength', '20')
      @slot('textDescription', 'Sección longitudinal.')
    @endcomponent
    @component('components.input_text_datalist')
      @slot('fieldName', 'sample_road_stripe')
      @foreach ($roadStripes as $roadStripe)
        @component('components.input_select_option')
          @slot('value')
            {{ $roadStripe->sample_road_stripe }}
          @endslot
          {{ $roadStripe->sample_road_stripe }}
        @endcomponent
      @endforeach
    @endcomponent
  @endcomponent

  {{-- bank id field --}}
  @component('components.input_select')
    @slot('label', 'Banco')
    @slot('fieldName', 'bank_id')
    @slot('value', $sample->bank_id)
    @slot('textHelp', 'bankHelp')
    @slot('textDescription', 'Banco de donde procede el material.')
    @foreach ($banks as $bank)
      @component('components.input_select_option')
        @slot('value')
          {{ $bank->id }}
        @endslot
        @slot('selected')
          {{ $sample->bank_id == $bank->id ? 'selected' : '' }}
        @endslot
        {{ $bank->bank_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample purpose id field --}}
  @component('components.input_select')
    @slot('label', 'Para utilizar en')
    @slot('fieldName', 'sample_purpose_id')
    @slot('value', $sample->sample_purpose_id)
    @slot('textHelp', 'purposeHelp')
    @slot('textDescription', 'Empleo que se le dará al material.')
    @foreach ($purposes as $purpose)
      @component('components.input_select_option')
        @slot('value')
          {{ $purpose->id }}
        @endslot
        @slot('selected')
          {{ $sample->sample_purpose_id == $purpose->id ? 'selected' : '' }}
        @endslot
        {{ $purpose->sample_purpose_name }}
      @endcomponent
    @endforeach
  @endcomponent
  @component('components.form_row')

    {{-- sample phreatic level field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'N. A. F.')
      @slot('fieldName', 'sample_phreatic_level')
      @slot('value', $sample->sample_phreatic_level)
      @slot('textHelp', 'phreaticHelp')
      @slot('textDescription', 'Nivel freático.')
    @endcomponent

    {{-- sampling seq field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Muestreo')
      @slot('fieldName', 'sampling_seq')
      @slot('value', $sample->sampling_seq)
      @slot('textHelp', 'samplingHelp')
      @slot('textDescription', 'Número de muestreo.')
    @endcomponent

    {{-- sample seq field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Muestra')
      @slot('fieldName', 'sample_seq')
      @slot('value', $sample->sample_seq)
      @slot('textHelp', 'sampleHelp')
      @slot('textDescription', 'Número de muestra.')
    @endcomponent

    {{-- sampling env temp field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Temperatura')
      @slot('fieldName', 'sampling_env_temp')
      @slot('value', $sample->sampling_env_temp)
      @slot('textHelp', 'temperatureHelp')
      @slot('textDescription', 'Temperatura ambiente.')
    @endcomponent
  @endcomponent

  {{-- sample weather id field --}}
  @component('components.input_select')
    @slot('label', 'Clima')
    @slot('fieldName', 'sample_weather_id')
    @slot('value', $sample->sample_weather_id)
    @slot('textHelp', 'weatherHelp')
    @slot('textDescription', 'Condiciones climáticas al momento de tomar la muestra.')
    @foreach ($weathers as $weather)
      @component('components.input_select_option')
        @slot('value')
          {{ $weather->id }}
        @endslot
        @slot('selected')
          {{ $sample->sample_weather_id == $weather->id ? 'selected' : '' }}
        @endslot
        {{ $weather->sample_weather_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample tests field --}}
  @component('components.input_text')
    @slot('label', 'Pruebas')
    @slot('fieldName', 'sample_tests')
    @slot('value', $sample->sample_tests)
    @slot('textHelp', 'testsHelp')
    @slot('maxLength', '100')
    @slot('textDescription', 'Estudios que se ralizarán al material.')
  @endcomponent

  {{-- sammple notes field --}}
  @component('components.input_textarea')
    @slot('label', 'Notas')
    @slot('fieldName', 'sample_notes')
    @slot('value', $sample->sample_notes)
    @slot('textHelp', 'notesHelp')
    @slot('maxLength', '500')
    @slot('textDescription', 'Cualquier observación o comentario adicional.')
  @endcomponent
  @component('components.form_row')

    {{-- sample receipt date field --}}
    @component('components.input_date')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Recibido')
      @slot('fieldName', 'sample_receipt_date')
      @slot('value', $sample->sample_receipt_date)
      @slot('textHelp', 'receiptHelp')
      @slot('textDescription', 'Fecha de recibido en el laboratorio.')
    @endcomponent

    {{-- sample priority id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Prioridad')
      @slot('fieldName', 'sample_priority_id')
      @slot('value', $sample->sample_priority_id)
      @slot('textHelp', 'priorityHelp')
      @slot('textDescription', 'Relevancia con respecto de los demás trabajos.')
      @foreach ($priorities as $priority)
        @component('components.input_select_option')
          @slot('value')
            {{ $priority->id }}
          @endslot
          @slot('selected')
            {{ $sample->sample_priority_id == $priority->id ? 'selected' : '' }}
          @endslot
          {{ $priority->sample_priority_name }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample status id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Estado')
      @slot('fieldName', 'sample_status_id')
      @slot('value', $sample->sample_status_id)
      @slot('textHelp', 'statusHelp')
      @slot('textDescription', 'Empleo que se le dará al material.')
      @foreach ($statuses as $status)
        @component('components.input_select_option')
          @slot('value')
            {{ $status->id }}
          @endslot
          @slot('selected')
            {{ $sample->sample_status_id == $status->id ? 'selected' : '' }}
          @endslot
          {{ $status->sample_status_name }}
        @endcomponent
      @endforeach
    @endcomponent
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('clients.index').'/'.$clientId)
    {{ $clientId }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumb_item')
  @slot('url', route('works.index').'/'.$workId)
    {{ $workId }}
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
    @slot('url', route('samples.index').'/'.$sample->id)
    {{ $sample->id }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('editar') }}
  @endcomponent
@endsection
