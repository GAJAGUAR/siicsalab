<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
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
        'scale_name',
        'scale_capacity',
        'scale_precision'
      )
      ->get();
  }
}
