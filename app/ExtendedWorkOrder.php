<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ExtendedWorkOrder extends Model
{
  public function indexWorkOrder()
  {
    return $this
      ->select(
        'id',
        'work_order_date',
        'work_nickname',
        'employee_nickname',
        'samples')
      ->get();
  }

  public function showWorkOrder(int $id)
  {
    return $this
      ->select(
        'id',
        'work_order_date',
        'client_name',
        'employee_id',
        'employee_name',
        'work_id',
        'work_name',
        'work_location')
      ->where('id', $id)
      ->first();
  }

  public function workOrdersByWork(int $id)
  {
    return $this
      ->select(
        'id',
        'work_order_date',
        'employee_name',
        'samples')
      ->where('work_id', $id)
      ->get();
  }

  public function workOrderIds()
  {
    return $this
      ->select('id')
      ->get();
  }
}
