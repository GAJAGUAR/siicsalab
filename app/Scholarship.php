<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
  protected $table = 'scholarship';

  public function employees()
  {
    return $this->hasMany(Employee::class);
  }

  public function scholarshipNames()
  {
    return $this
      ->select(
        'id',
        'scholarship_name')
      ->get();
  }
}
