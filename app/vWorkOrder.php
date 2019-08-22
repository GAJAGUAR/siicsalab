<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class vWorkOrder extends Model
{
  public function getWorkOrders()
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
        'employee_name',
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
