<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SampleStatus extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function statusNames()
  {
    return $this
      ->select(
        'id',
        'sample_status_name')
      ->get();
  }
}
