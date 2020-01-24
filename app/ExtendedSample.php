<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtendedSample extends Model
{
  public function list()
  {
    return $this
    ->select(
      'id',
      'work_order_id',
      'work_order_date',
      'sample_description',
      'sample_purpose_name')
    ->get();
  }

  public function describe(Int $id)
  {
    return $this
    ->select(
      'id',
      'work_order_id',
      'work_order_date',
      'client_id',
      'client_name',
      'work_id',
      'work_name',
      'work_location',
      'employee_name',
      'sample_time',
      'sample_description',
      'sample_treatment',
      'sample_location',
      'sample_road',
      'bank_name',
      'bank_location',
      'sample_purpose_name',
      'sample_phreatic_level',
      'sampling_seq',
      'sample_seq',
      'sampling_env_temp',
      'sample_weather_name',
      'sample_tests',
      'sample_notes',
      'sample_receipt_date',
      'sample_priority_name',
      'sample_status_name',
      'sample_url'
    )
    ->findOrFail($id);
  }

  public function samplesByWorkOrder(Int $id)
  {
    return $this
    ->select(
      'id',
      'work_order_date',
      'sample_description',
      'sample_purpose_name')
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
      ->select('sample_road_name')
      ->where('sample_road_name', 'NOT LIKE', '')
      ->groupBy('sample_road_name')
      ->orderBy('sample_road_name')
      ->get();
  }

  public function roadBodyNames()
  {
    return $this
      ->select('sample_road_body')
      ->where('sample_road_body', 'NOT LIKE', '')
      ->groupBy('sample_road_body')
      ->orderBy('sample_road_body')
      ->get();
  }

  public function roadSideNames()
  {
    return $this
      ->select('sample_road_side')
      ->where('sample_road_side', 'NOT LIKE', '')
      ->groupBy('sample_road_side')
      ->orderBy('sample_road_side')
      ->get();
  }

  public function roadStripeNames()
  {
    return $this
      ->select('sample_road_stripe')
      ->where('sample_road_stripe', 'NOT LIKE', '')
      ->groupBy('sample_road_stripe')
      ->orderBy('sample_road_stripe')
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
