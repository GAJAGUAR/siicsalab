<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SampleWeather extends Model
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
        'sample_weather_name')
      ->get();
  }
}
