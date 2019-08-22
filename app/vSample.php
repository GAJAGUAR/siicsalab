<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class vSample extends Model
{
  public function getSamples()
  {
    return $this
    ->select(
      'id',
      'work_order_id',
      'purpose_name',
      'sample_description',
      'sample_receipt_date')
    ->get();
  }

  public function getDescriptions()
  {
    return $this
    ->select('sample_description')
    ->groupBy('sample_description')
    ->get();
  }

  public function getTreatments()
  {
    return $this
    ->select('sample_treatment')
    ->groupBy('sample_treatment')
    ->get();
  }

  public function getRoadNames()
  {
    return $this
    ->select('road_name')
    ->groupBy('road_name')
    ->get();
  }

  public function getRoadBodies()
  {
    return $this
    ->select('road_body')
    ->groupBy('road_body')
    ->get();
  }

  public function getRoadSides()
  {
    return $this
    ->select('road_side')
    ->groupBy('road_side')
    ->get();
  }

  public function showSample(int $id)
  {
    return $this
    ->select(
      'id',
      'work_order_id',
      'work_order_date',
      'client_name',
      'work_name',
      'work_location',
      'sample_time',
      'sample_description',
      'sample_treatment',
      'sample_location',
      'road',
      'bank_name',
      'bank_location',
      'purpose_name',
      'phreatic_level',
      'sampling_seq',
      'sample_seq',
      'env_temp',
      'weather_name',
      'sample_tests',
      'sample_notes',
      'sample_receipt_date',
      'priority_name',
      'status_name')
    ->where('id', $id)
    ->first();
  }

  public function showWorkOrderSamples(int $id)
  {
    return $this
    ->select(
      'id',
      'purpose_name',
      'sample_description',
      'sample_receipt_date')
    ->where('work_order_id', $id)
    ->get();
  }
}
