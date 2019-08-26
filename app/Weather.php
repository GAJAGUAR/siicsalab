<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function weatherNames()
  {
    return $this
      ->select(
        'id',
        'weather_name')
      ->get();
  }
}
