<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  public function employees()
  {
    return $this->hasMany(Employee::class);
  }

  public function positionNames()
  {
    return $this
      ->select(
        'id',
        'position_name')
      ->get();
  }
}
