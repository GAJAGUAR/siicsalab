<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  public function workOrders()
  {
    return $this->hasMany(WorkOrder::class);
  }
}
