<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class SampleDescription extends Model
{
  public function get()
  {
    return $this
      ->select('sample_description')
      ->get();
  }
}
