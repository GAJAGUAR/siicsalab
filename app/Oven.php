<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oven extends Model
{
  public function aashtoTests()
  {
    return $this->hasMany(AashtoTest::class);
  }

  public function list()
  {
    return $this
      ->select('id', 'oven_name')->get();
  }
}
