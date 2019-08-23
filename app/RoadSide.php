<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class RoadSide extends Model
{
  public function get()
  {
    return $this
      ->select('road_side')
      ->get();
  }
}
