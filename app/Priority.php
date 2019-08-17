<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function getPriorities()
  {
    return $this
      ->select('id', 'priority_name')
      ->get();
  }
}
