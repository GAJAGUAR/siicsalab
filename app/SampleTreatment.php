<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class SampleTreatment extends Model
{
  public function get()
  {
    return $this
      ->select('sample_treatment')
      ->get();
  }
}
