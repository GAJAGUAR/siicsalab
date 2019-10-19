<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtendedEmployee extends Model
{
  public function extendedWorkOrders()
  {
    return $this->hasMany(ExtendedWorkOrder::class);
  }

  public function indexEmployee()
  {
    return $this
      ->select(
        'id',
        'employee_name',
        'work_orders')
      ->get();
  }

  public function showEmployee(int $id)
  {
    return $this
      ->select(
        'id',
        'employee_nickname',
        'employee_name',
        'scholarship_name',
        'employee_birthdate',
        'employee_gender',
        'work_orders')
      ->findOrFail($id);
  }
}
