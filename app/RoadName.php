<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class RoadName extends Model
{
  public function get()
  {
    return $this
      ->select('road_name')
      ->get();
  }
}
