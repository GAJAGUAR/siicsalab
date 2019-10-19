<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  public function scholarship()
  {
    return $this->belongsTo(Scholarship::class);
  }

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

  public function employeeNames()
  {
    return $this
      ->select(
        'id',
        'employee_name')
      ->get();
  }
}
