<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class RoadBody extends Model
{
  public function get()
  {
    return $this
      ->select('road_body')
      ->get();
  }
}
