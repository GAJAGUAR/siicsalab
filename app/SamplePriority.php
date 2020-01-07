<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SamplePriority extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function priorityNames()
  {
    return $this
      ->select(
        'id',
        'sample_priority_name')
      ->orderBy('id')
      ->get();
  }
}
