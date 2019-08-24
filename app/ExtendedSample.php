<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ExtendedSample extends Model
{
  public function get()
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

  public function show(int $id)
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
