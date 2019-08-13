<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

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

  public function getSamples()
  {
    //
  }

  public function showSample(int $id)
  {
    //
  }

  public function showWorkOrderSamples(int $id)
  {
    //
  }
}
