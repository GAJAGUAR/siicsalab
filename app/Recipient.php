<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
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
        'recipient_name',
        'recipient_mass',
        'recipient_volume'
      )
      ->get();
  }
}
