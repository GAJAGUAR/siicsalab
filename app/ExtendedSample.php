<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ExtendedSample extends Model
{
  public function indexSample()
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

  public function samplesByWorkOrder(int $id)
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

  public function descriptionNames()
  {
    return $this
      ->select('sample_description')
      ->where('sample_description', 'NOT LIKE', '')
      ->groupBy('sample_description')
      ->orderBy('sample_description')
      ->get();
  }

  public function treatmentNames()
  {
    return $this
      ->select('sample_treatment')
      ->where('sample_treatment', 'NOT LIKE', '')
      ->groupBy('sample_treatment')
      ->orderBy('sample_treatment')
      ->get();
  }

  public function locationNames()
  {
    return $this
      ->select('sample_location')
      ->where('sample_location', 'NOT LIKE', '')
      ->groupBy('sample_location')
      ->orderBy('sample_location')
      ->get();
  }

  public function roadNames()
  {
    return $this
      ->select('road_name')
      ->where('road_name', 'NOT LIKE', '')
      ->groupBy('road_name')
      ->orderBy('road_name')
      ->get();
  }

  public function roadBodyNames()
  {
    return $this
      ->select('road_body')
      ->where('road_body', 'NOT LIKE', '')
      ->groupBy('road_body')
      ->orderBy('road_body')
      ->get();
  }

  public function roadSideNames()
  {
    return $this
      ->select('road_side')
      ->where('road_side', 'NOT LIKE', '')
      ->groupBy('road_side')
      ->orderBy('road_side')
      ->get();
  }

  public function testNames()
  {
    return $this
      ->select('sample_tests')
      ->where('sample_tests', 'NOT LIKE', '')
      ->groupBy('sample_tests')
      ->orderBy('sample_tests')
      ->get();
  }
}
