<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtendedEmployee extends Model
{
  public function extendedWorkOrders()
  {
    return $this->hasMany(ExtendedWorkOrder::class);
  }

  public function list()
  {
    return $this
      ->select(
        'id',
        'employee_name',
        'position_name',
        'work_orders'
      )
      ->get();
  }

  public function describe(Int $id)
  {
    return $this
      ->select(
        'id',
        'employee_nickname',
        'employee_name',
        'position_name',
        'scholarship_name',
        'employee_birthdate',
        'employee_gender'
      )
      ->findOrFail($id);
  }
}
