<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class SampleTest extends Model
{
  public function get()
  {
    return $this
      ->select('sample_tests')
      ->get();
  }
}
