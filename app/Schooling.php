<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schooling extends Model
{
  public function employees()
  {
    return $this->hasMany(Employee::class);
  }

  public function list()
  {
    return $this::select('id', 'schooling_name')->get();
  }
}
