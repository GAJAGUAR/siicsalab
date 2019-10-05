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
 * @property mixed sample_treatment
 * @property mixed sample_location
 * @property mixed sample_road_name
 * @property mixed sample_road_station_start
 * @property mixed sample_road_station_end
 * @property mixed sample_road_station
 * @property mixed sample_road_body
 * @property mixed sample_road_side
 * @property mixed sample_road_stripe
 * @property mixed phreatic_level
 * @property mixed sampling_seq
 * @property mixed env_temp
 * @property mixed sample_seq
 * @property mixed sample_tests
 * @property mixed sample_notes
 * @property mixed sample_receipt_date
 * @property mixed sample_latitude
 * @property mixed sample_longitude
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
    $sample->sample_treatment = $request->get('sample_treatment');
    $sample->sample_location = $request->get('sample_location');
    $sample->sample_road_name = $request->get('sample_road_name');
    $sample->sample_road_station_start = $request->get('sample_road_station_start');
    $sample->sample_road_station_end = $request->get('sample_road_station_end');
    $sample->sample_road_station = $request->get('sample_road_station');
    $sample->sample_road_body = $request->get('sample_road_body');
    $sample->sample_road_side = $request->get('sample_road_side');
    $sample->sample_road_stripe = $request->get('sample_road_stripe');
    $sample->phreatic_level = $request->get('phreatic_level');
    $sample->sampling_seq = $request->get('sampling_seq');
    $sample->env_temp = $request->get('env_temp');
    $sample->sample_seq = $request->get('sample_seq');
    $sample->sample_tests = $request->get('sample_tests');
    $sample->sample_notes = $request->get('sample_notes');
    $sample->sample_receipt_date = $request->get('sample_receipt_date');
    $sample->sample_latitude = $request->get('sample_latitude');
    $sample->sample_longitude = $request->get('sample_longitude');
    $sample->sketch_file = $request->get('sketch_file');
    $sample->stratigraphic_file = $request->get('stratigraphic_file');
    $sample->save();
  }
}
