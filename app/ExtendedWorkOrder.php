<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ExtendedWorkOrder extends Model
{
  public function get()
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

  public function show(int $id)
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

  public function showWorkWorkOrders(int $id)
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
}
