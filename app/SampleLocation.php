<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class SampleLocation extends Model
{
  public function get()
  {
    return $this
      ->select('sample_location')
      ->get();
  }
}
