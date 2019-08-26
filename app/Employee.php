<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  public function workOrders()
  {
    return $this->hasMany(WorkOrder::class);
  }

  public function indexEmployee()
  {
    return $this
      ->select('id', 'employee_name')
      ->get();
  }

  public function showEmployee(int $id)
  {
    //
  }

  public function employeeNames()
  {
    return $this
      ->select(
        'id',
        'employee_name')
      ->get();
  }
}
