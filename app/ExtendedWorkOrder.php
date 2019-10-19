<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

  public function showWorkOrder(Int $id)
  {
    return $this
      ->select(
        'id',
        'work_order_date',
        'client_id',
        'client_name',
        'employee_id',
        'employee_name',
        'work_id',
        'work_name',
        'work_location')
      ->findOrFail($id);
  }

  public function workOrdersByWork(Int $id)
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

  public function workOrdersByEmployee(Int $id)
  {
    return $this
      ->select(
        'id',
        'work_order_date',
        'work_nickname',
        'samples')
      ->where('employee_id', $id)
      ->get();
  }

  public function workOrderIds()
  {
    return $this
      ->select('id')
      ->get();
  }
}
