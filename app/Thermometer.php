<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thermometer extends Model
{
  public function aashtoTests()
  {
    return $this->hasMany(AashtoTest::class);
  }

  public function list()
  {
    return $this
      ->select(
        'id',
        'thermometer_name'
      )
      ->get();
  }
}
