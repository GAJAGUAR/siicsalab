<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

/**
 * @property mixed id
 * @property mixed work_order_id
 * @property mixed bank_id
 * @property mixed purpose_id
 * @property mixed weather_id
 * @property mixed priority_id
 * @property mixed status_id
 * @property mixed sample_time
 * @property mixed sample_description
 * @property mixed sample_location
 * @property mixed road_name
 * @property mixed road_station_start
 * @property mixed road_station_end
 * @property mixed road_station
 * @property mixed road_body
 * @property mixed road_side
 * @property mixed phreatic_level
 * @property mixed sampling_seq
 * @property mixed env_temp
 * @property mixed sample_seq
 * @property mixed sample_tests
 * @property mixed sample_notes
 * @property mixed sample_receipt_date
 * @property mixed sample_loc_x
 * @property mixed sample_loc_y
 * @property mixed sketch_file
 * @property mixed stratigraphic_file
 */
class Sample extends Model
{
  public function workOrder()
  {
    return $this->belongsTo(WorkOrder::class);
  }

  public function bank()
  {
    return $this->belongsTo(Bank::class);
  }

  public function purpose()
  {
    return $this->belongsTo(Purpose::class);
  }

  public function weather()
  {
    return $this->belongsTo(Weather::class);
  }

  public function priority()
  {
    return $this->belongsTo(Priority::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function isValid(Request $request)
  {
    $request->validate([
      'id' => 'required|integer',
      'work_order_id' => 'required|integer',
      'bank_id' => 'nullable|integer',
      'purpose_id' => 'required|integer',
      'weather_id' => 'nullable|integer',
      'priority_id' => 'required|integer|min:1|max:3',
      'status_id' => 'required|integer|min:1|max:5',
      'sample_time' => 'required',
      'sample_description' => 'required|min:5|max:250',
      'sample_location' => 'nullable|min:5|max:100',
      'road_name' => 'nullable|min:5|max:100',
      'road_station_start' => 'nullable|max:11',
      'road_station_end' => 'nullable|max:11',
      'road_station' => 'nullable|max:11',
      'road_body' => 'nullable|max:20',
      'road_side' => 'nullable|max:10',
      'phreatic_level' => 'nullable|max:4',
      'sampling_seq' => 'nullable|numeric|min:1',
      'env_temp' => 'nullable|numeric|min:1|max:50',
      'sample_seq' => 'nullable|numeric|min:1',
      'sample_tests' => 'nullable|max:100',
      'sample_notes' => 'nullable|max:500',
      'sample_receipt_date' => 'required|date|before:tomorrow',
      'sketch_file' => 'nullable|url|max:50',
      'stratigraphic_file' => 'nullable|url|max:50'
    ]);
  }

  public function getSamples()
  {
    return $this
      ->select('samples.id', 'work_order_id', 'purpose_name', 'sample_description', 'sample_receipt_date')
      ->join('work_orders', 'work_orders.id', '=', 'samples.work_order_id')
      ->join('works', 'works.id', '=', 'work_orders.work_id')
      ->join('clients', 'clients.id', '=', 'works.client_id')
      ->join('purposes', 'purposes.id', '=', 'samples.purpose_id')
      ->join('statuses', 'statuses.id', '=', 'samples.status_id')
      ->get();
  }

  public function showSample(int $id)
  {
    return $this
      ->select('samples.id', 'work_order_id', 'bank_name', 'purpose_name', 'weather_name', 'priority_name', 'status_name', 'sample_time','sample_description', 'sample_location', 'road_name', 'road_station_start', 'road_station_end', 'road_station', 'road_body', 'road_side', 'phreatic_level', 'sampling_seq', 'env_temp', 'sample_seq', 'sample_tests', 'sample_notes', 'sample_receipt_date')
      ->join('work_orders', 'work_orders.id', '=', 'samples.work_order_id')
      ->join('works', 'works.id', '=', 'work_orders.work_id')
      ->join('clients', 'clients.id', '=', 'works.client_id')
      ->join('banks', 'banks.id', '=', 'samples.bank_id')
      ->join('purposes', 'purposes.id', '=', 'samples.purpose_id')
      ->join('weathers', 'weathers.id', '=', 'samples.weather_id')
      ->join('priorities', 'priorities.id', '=', 'samples.priority_id')
      ->join('statuses', 'statuses.id', '=', 'samples.status_id')
      ->first();
  }

  public function showWorkOrderSamples(int $id)
  {
    //
  }

  public function saveSample(Request $request, Sample $sample)
  {
    $sample->id = $request->get('id');

    $sample->work_order_id = $request->get('work_order_id');

    $sample->bank_id = $request->get('bank_id');

    $sample->purpose_id = $request->get('purpose_id');

    $sample->weather_id = $request->get('weather_id');

    $sample->priority_id = $request->get('priority_id');

    $sample->status_id = $request->get('status_id');

    $sample->sample_time = $request->get('sample_time');

    $sample->sample_description = $request->get('sample_description');

    $sample->sample_location = $request->get('sample_location');

    $sample->road_name = $request->get('road_name');

    $sample->road_station_start = $request->get('road_station_start');

    $sample->road_station_end = $request->get('road_station_end');

    $sample->road_station = $request->get('road_station');

    $sample->road_body = $request->get('road_body');

    $sample->road_side = $request->get('road_side');

    $sample->phreatic_level = $request->get('phreatic_level');

    $sample->sampling_seq = $request->get('sampling_seq');

    $sample->env_temp = $request->get('env_temp');

    $sample->sample_seq = $request->get('sample_seq');

    $sample->sample_tests = $request->get('sample_tests');

    $sample->sample_notes = $request->get('sample_notes');

    $sample->sample_receipt_date = $request->get('sample_receipt_date');

    $sample->sample_loc_x = $request->get('sample_loc_x');

    $sample->sample_loc_y = $request->get('sample_loc_y');

    $sample->sketch_file = $request->get('sketch_file');

    $sample->stratigraphic_file = $request->get('stratigraphic_file');

    $sample->save();
  }

  public function deleteSample(int $id)
  {
    $this
      ->find($id)
      ->delete;
  }
}
